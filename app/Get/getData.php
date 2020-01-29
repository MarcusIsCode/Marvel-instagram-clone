<?php
require __DIR__ . '/../autoload.php';

$followings = 'SELECT DISTINCT follow_id
FROM user_follows
WHERE user_id=:user_id';

$statement = $pdo->prepare($followings);

$statement->execute([
    'user_id' => $_SESSION['user']['id']
]);

$followings = $statement->fetchAll(PDO::FETCH_COLUMN);

//Insert users own id.
$followings[] = $_SESSION['user']['id'];

//name,post_img,text,user_id, post_id,date
$posts = 'SELECT users.profile_name, posts.*
    FROM posts
    LEFT JOIN users
    ON posts.user_id = users.id
    WHERE user_id=:user_id';

$statement = $pdo->prepare($posts);

foreach ($followings as $following) {
    $statement->execute([
        ':user_id' => $following
    ]);

    $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($allPosts as $post) {
        $getPosts[] = $post;
    }
}

if (!empty($getPosts)) {
    usort($getPosts, 'sortByDate');
}

//comment
$comment =  'SELECT post_id,comment,comment_name FROM comment_posts WHERE post_id=:post_id';
$statementComment = $pdo->prepare($comment);

for ($v = 0; $v < count($getPosts); $v++) {

    foreach ($getPosts as $post) {
        $statementComment->execute([
            ':post_id' => $post['post_id']
        ]);

        $getComment = $statementComment->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($getComment);

        for ($x = 0; $x < count($getComment); $x++) {
            if ($getComment[$x]['post_id'] === $getPosts[$v]['post_id']) {
                $getPosts[$v]['comments']['name'][] = $getComment[$x]['comment_name'];
                $getPosts[$v]['comments']['comment'][] = $getComment[$x]['comment'];
            }
            // $getPosts[$v]['comments']['name'][] = $getComment[$x]['comment_name'];
            // $getPosts[$v]['comments']['comment'][] = $getComment[$x]['comment'];
        };

        // if (!empty($getComment[]) && $getComment['post_id'] === $getPosts[$v]['post_id']) {
        //     var_dump($getComment);
        //     // $getPosts[$i]['comments']['name'][] = $getComment[$]['comment_name'];
        // }
    }
}

//likes
$likes = 'SELECT post_id, count(likes) FROM like_posts WHERE post_id = :post_id';
$statementLike = $pdo->prepare($likes);
// $l = count($getPosts);
for ($i = 0; $i < count($getPosts); $i++) {

    foreach ($getPosts as $post) {
        $statementLike->execute([
            ':post_id' => $post['post_id']
        ]);

        $getLike  = $statementLike->fetch(PDO::FETCH_ASSOC);

        if ($getLike['post_id'] === $getPosts[$i]['post_id']) {
            $getPosts[$i]['like'] = $getLike['count(likes)'];
        }

        if (!$getLike || $getLike['post_id'] === null) {
            $getPosts[$i]['like'] = '0';
        }
    }
}

//all post data from db sent to json
$json = json_encode($getPosts);
file_put_contents(__DIR__ . '/getData.json', $json);

redirect('/');
