<?php
use System\config;
/**
 * Spotlight post class
 * Uses data of view v_destaques
 */
class noticias extends Base
{
    public static $table = 'v_noticias';
    /**
     * Retrieves a post by ID
     *
     * @param int $id post ID
     *
     * @return \post
     * @throws \Exception
     */
    public static function id($id)
    {
        return static::get('id', $id);
    }
    /**
     * Retrieves a post
     *
     * @param string     $row post row name to compare in
     * @param string|int $val post value to compare to
     *
     * @return \stdClass
     * @throws \Exception
     */
    private static function get($row, $val)
    {
        return static::left_join(
            Base::table('users'),
            Base::table('users.id'),
            '=',
            Base::table('v_noticias.author')
        )->where(Base::table('v_noticias.' . $row), '=', $val)
                     ->fetch([
                         Base::table('v_destaques.*'),
                         Base::table('users.id as author_id'),
                         Base::table('users.bio as author_bio'),
                         Base::table('users.email as author_email'),
                         Base::table('users.real_name as author_name')
                     ]);
    }
}
