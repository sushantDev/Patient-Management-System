<?php

/**
 * @param $value
 * @param string $dash
 * @return string
 */
function display($value, $dash = '-')
{
    if (empty($value))
    {
        return $dash;
    }

    return $value;
}

function user_avatar($width, $username = null)
{
    if ($username)
    {
        $user = \App\Models\User::whereUsername($username)->first();
    } else
    {
        $user = auth()->user();
    }

    if ($image = $user->image)
    {
        return asset($image->thumbnail($width, $width));
    } else
    {
        return asset('img/avatar.png');
    }
}

/**
 * @param $width
 * @param null $entity
 * @return mixed
 */
function thumbnail($width, $height = null, $entity = null)
{
    $height ?: $height = $width;

    if ( ! is_null($entity))
    {
        if ($image = $entity->image)
        {
            return asset($image->thumbnail($width, $height));
        }
    }

    return asset(setting('placeholder'));
}

/**
 * @param $query
 * @return mixed
 */
function setting($query)
{
    $setting = \App\Setting::fetch($query)->first();

    return $setting ? $setting->value : null;
}

/**
 * Return array 6 latest posts
 * @return array
 */
function latestPosts($type = 'large')
{
    $latestPosts = [];

    $posts = App\Post::published()->latest()->limit(6)->get();

    if ('large' == $type)
    {
        foreach ($posts as $post)
        {
            array_push($latestPosts, [
                'title'     => $post->title,
                'slug'      => $post->slug,
                'd'         => $post->created_at->format('d'),
                'mon'       => $post->created_at->format('M'),
                'image'     => $post->image && file_exists(public_path($post->image->path)) ? $post->image->thumbnail(300, 250) : '\img\post-placeholder.png',
                'image_alt' => str_slug($post->image->name),
                'tags'      => $post->tags->pluck('title')->all()
            ]);
        }

        return $latestPosts;
    } else {
        foreach ($posts as $post)
        {
            array_push($latestPosts, [
                'title'     => $post->title,
                'slug'      => $post->slug,
                'date'      => $post->created_at->format('F d, Y'),
                'image'     => $post->image && file_exists(public_path($post->image->path)) ? $post->image->thumbnail(60, 60) : '\img\post-placeholder.png',
                'image_alt' => str_slug($post->image->name)
            ]);
        }

        return $latestPosts;
    }
}

/**
 * Return array of 6 featured posts
 * @return array
 */
function featuredPosts()
{
    $featuredPosts = [];

    foreach ($posts = App\Post::published()->featured()->latest()->limit(6)->get() as $post)
    {
        array_push($featuredPosts, [
            'title'     => $post->title,
            'slug'      => $post->slug,
            'image'     => $post->image && file_exists(public_path($post->image->path)) ? $post->image->thumbnail(360, 270) : '\img\post-placeholder.png',
            'image_alt' => str_slug($post->image->name),
            'content'   => str_limit(strip_tags($post->content), 182)
        ]);
    }

    return $featuredPosts;
}

/**
 * Return array of tags
 * @return array
 */
function tags()
{
    return App\Tag::all();
}