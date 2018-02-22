<?php

/**
 * Class Post
 */
class Post extends Model {

    /**
     * @param $post_title
     * @param $post_content
     * @param $post_author
     * @param null $post_id
     * @return bool
     */
    public function updatePost($post_title, $post_content, $post_author, $post_id = null) {
        $time = date("Y-m-d h:i:s");

        if (!isset($post_id)) {
            $stmt = $this->mysqli->prepare("INSERT INTO posts(PostTitle, PostContent, PostAuthor, DateCreated, DateModified) VALUES(?, ?, ?, ?, ?);");
            $stmt->bind_param('ssiss', $post_title, $post_content, $post_author, $time, $time);
        } else {
            //$stmt = $this->mysqli->prepare('UPDATE posts SET VALUES(?, ?, ?, ?, ?);');
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
    }


    /**
     * @param $key
     * @param $post_id
     * @return mixed
     */
    public function getPostData($key, $post_id) {
        $stmt = $this->mysqli->prepare("SELECT DataValue FROM data WHERE DataKey=? AND PID=?;");
        $stmt->bind_param('si', $key, $post_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($data_value);
        $stmt->fetch();

        return $data_value;
    }


    /**
     * @return array
     */
    public function getPosts() {
        $posts = array();

        $stmt = $this->mysqli->prepare("SELECT * FROM posts;");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($post_id, $post_title, $post_content, $post_author, $post_created, $post_modified);

        while ($stmt->fetch()) {


            $object = new stdClass();

            $object->PostID = $post_id;
            $object->PostTitle = $post_title;
            $object->PostContent = $post_content;
            $object->PostAuthor = $post_author;
            $object->DateCreated = $post_created;
            $object->DateModified = $post_modified;

            array_push($posts, $object);


            //echo "<br />Data: " . $this->getPostData('post_thumbnail', $post_id) . "<br/><br/><br/>";

        }

        return $posts;

        $stmt->close();
    }
}