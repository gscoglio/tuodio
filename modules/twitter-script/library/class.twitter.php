<?php
/**
 *
 * @author gonzalo
 */
class Twitter {

    private $application;
    private $Database;
    private $connection;
    var $log;
    var $error = false;

    function __construct($application) {
        $this->application = $application;
        $this->Database = new Database();
        $this->log = array();
  $this->connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);
    }

    public function run() {
        $this->log('Script Started for ' . $this->application);
        $friendship = $this->getFriendships();
        $this->unFollow($friendship['toDelete']); if($this->error) return;
        $this->follow($friendship['toAdd']); if($this->error) return;
        $candidates = $this->searchCandidates();
        $this->follow($candidates);
        $this->log('Script ends' . ($this->error ? ' WITH ERROR' : ''));
    }

    private function log($msg) {
        $this->log[] = date('d/m/Y h:i:s:u') . "\t$msg";
    }

    private function unFollow($list) {
        $count = 0;
        foreach($list as $id) {
            $result = $this->connection->post('friendships/destroy', array('user_id' => $id));
      if(!empty($result->error)) {
                if(!$this->shouldIgnoreError($result->error)) {
                        $this->log('ERROR: '.$result->error . ' user_id: ' . $id);
                        $this->error = true;
                         break;
                }
      } else {
              $count++;
              $i++; if($i==150) break;
     }
        }
        $this->log("Unfollowed: $count");
    }

    private function follow($list) {
        $count = 0;
        $fecha = date('Ymd');
        foreach($list as $id) {
            $result = $this->connection->post('friendships/create', array('user_id' => $id));
            if(!empty($result->error)) { 
    if(!$this->shouldIgnoreError($result->error)) {
                  $this->log('ERROR: '.$result->error . ' user_id: ' . $id);
                  $this->error = true;
                  break;
    }
            } else {
              $count++;
              $this->Database->query_insert('following', array('user_id' => $id, 'application' => $this->application, 'fecha' => $fecha));
              $i++; if($i==50) break;
      }
        }
        $this->log("Followed: $count");
    }


   private function shouldIgnoreError($error) {

  $errors =  array('Could not follow user: Sorry, this account has been suspended.',
       'Not found',
       "You've already requested to follow",
        );

  foreach($errors as $e){
           $pos = strpos($error, $e);
           if($pos !== false) return true;
        }
  return false;
   }



    private function searchCandidates() {
        $hashtags = $this->getHashtags();
        $result = array();
        foreach ($hashtags as $tag) {
      $context = stream_context_create(array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\nCookie: foo=bar\r\n")));
            $content = file_get_contents('http://search.twitter.com/search.json?rpp=100&q='.$tag, null, $context);
            $content = json_decode($content, true);
            $this->log("Got candidates for $tag");
            foreach ($content['results'] as $item) {
                $user_id = $item['from_user_id'];
                if(!in_array($user_id, $result)) {
                    $result[] = $user_id;
                }
            }
      if(count($result)>200) break;
        }

        $this->log("Total candidates " . count($result));
        return empty($result) ? $result : $this->cleanCandidates($result);
    }


    private function cleanCandidates($list) {
        $candidates = implode(',', $list);
        $sql = "SELECT * FROM following WHERE user_id IN ($candidates)";
        $data = $this->Database->fetch_all_array($sql);
        $alreadyExists = array();
        foreach ($data as $item) {
            $alreadyExists[] = $item['user_id'];
        }

        $diff = array_diff($list, $alreadyExists);
        $this->log("Candidates to be Added " . count($diff));
        return $diff;
    }

    private function getHashtags() {

        if(!file_exists(HASHTAGS_FILE)) return array();
        
        $result = array();
        $fp = fopen(HASHTAGS_FILE, 'r');
        while(!feof($fp)) {
            $hashtag = str_replace("\n", '', fgets($fp));
            if(!empty ($hashtag)) $result[] = $hashtag;
        }

        return $result;
    }

    private function getFriendships() {

        $followers = $this->getFollowers();
        $following = $this->getFollowing();

        $this->log('Followers: ' . count($followers));
        $this->log('Following: ' . count($following));

        $shouldUnFollow = array_diff($following, $followers);
        $shouldFollow = array_diff($followers, $following);

        $this->log('Should Follow: ' . count($shouldFollow));
        $this->log('Should UnFollow: ' . count($shouldUnFollow));

        $lastAdd = $this->getLastAdds();
        $shouldUnFollow = array_diff($shouldUnFollow, $lastAdd);

        $this->log('Last added: ' . count($lastAdd));
        $this->log('Should UnFollow: ' . count($shouldUnFollow));

        return array('toAdd' => $shouldFollow, 'toDelete' => $shouldUnFollow);
    }

    private function getLastAdds() {
        $minDate = date('Ymd', (time() - (2*24*60*60)));
        $data = $this->Database->fetch_all_array("SELECT * FROM following WHERE application='{$this->application}' AND fecha >= '$minDate'");

        $result = array();
        foreach ($data as $item) {
            $result[] = $item['user_id'];
        }

        return $result;
    }

    private function getFollowing() {
        $context = stream_context_create(array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\nCookie: foo=bar\r\n")));
        $following = file_get_contents('http://api.twitter.com/1/friends/ids.json?screen_name='.$this->application, null, $context);
        $decode = json_decode($following, true);
        return $decode['ids'];
    }

    private function getFollowers() {
      $context = stream_context_create(array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\nCookie: foo=bar\r\n")));
      $followers = file_get_contents('http://api.twitter.com/1/followers/ids.json?screen_name='.$this->application, null, $context);
      $decode = json_decode($followers, true);
      return $decode['ids'];
    }

}
?>
