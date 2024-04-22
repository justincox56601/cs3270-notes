<?php

require_once './blog-post.model.php';

class DatabaseService{

    private $_posts = [
        [
            'id'=>1, 
            'title'=>'my fist post', 
            'content'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel sapien tempus ipsum congue egestas quis aliquam risus. Aenean et viverra ex. Integer pretium sagittis massa, sollicitudin mattis ante tristique ac. Mauris vitae nunc eget arcu iaculis ultrices. Duis auctor, enim sed consectetur ullamcorper, arcu nulla vestibulum velit, vel congue nulla odio at dui. Nunc tincidunt porttitor sapien auctor porta. Nullam eget diam suscipit, bibendum lacus at, rhoncus leo. Proin hendrerit quis augue eget pharetra.', 
            'author'=>'Jake', 
            'date'=>'2020-04-01', 
            'category'=>'travel'
        ],
        [
            'id'=>2, 
            'title'=>'Post number two', 
            'content'=>'Mauris ut lorem tincidunt, finibus velit in, pulvinar odio. Sed molestie eget velit aliquam vehicula. Maecenas sed finibus nisl. Donec ut ex in lorem elementum venenatis ac ut quam. Donec suscipit vulputate blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean mattis diam at tellus tincidunt, in pulvinar urna semper. Donec vehicula risus nec eros blandit, quis interdum est dapibus. Curabitur sit amet nisl auctor velit feugiat cursus sed eu libero. Nunc venenatis ullamcorper magna, eu interdum velit congue eu. Curabitur eget lorem bibendum, sollicitudin lectus et, imperdiet mi. Vivamus eget risus rhoncus, sollicitudin tortor in, sodales ligula.', 
            'author'=>'Jake', 
            'date'=>'2020-03-01', 
            'category'=>'sports'
        ],
        [
            'id'=>3, 
            'title'=>'Third time is the charm', 
            'content'=>'Donec ante ipsum, iaculis eget lectus sit amet, efficitur ultrices magna. Proin purus nunc, molestie vitae metus at, auctor pretium orci. Donec rutrum ipsum eu purus vestibulum iaculis. Morbi dolor ipsum, vestibulum at cursus in, fermentum non libero. Curabitur sollicitudin accumsan ex, nec maximus nisi imperdiet ut. Mauris lectus mi, scelerisque a tincidunt ut, sollicitudin id odio. Vivamus massa sapien, varius eget lorem eu, fermentum sagittis velit. Suspendisse congue libero leo, vel lobortis eros dapibus sed.', 
            'author'=>'jenny', 
            'date'=>'2020-02-01', 
            'category'=>'technology'
        ],
    ];

    public function get_posts(){
        $response = [];
        foreach($this->_posts as $data){
            $response[] = new BlogPostModel($data);
        }

        return $response;
    }

    public function get_post_by_id($id){
        foreach($this->_posts as $data){
            if($data['id'] == $id){
                return new BlogPostModel($data);
            }
        }
        return null;
    }

    private function _get_post_index_by_id($id){
        foreach($this->_posts as $key=>$value){
            if($value['id'] == $id){
                return $key;
            }
        }
        return null;
    }

    public function submit_post($data){
       //this is wehre you would do the queries to insert a post to the database
       $this->_posts[] = $data;
    }

    public function edit_post($data){
        //this is where you would do the queries to edit a post in your database
        $index = $this->_get_post_index_by_id($data['id']);
        $this->_posts[$index] = $data;
    }

}