<?php

namespace App\Model;

use Atl\Database\Model;

class TokenModel extends Model
{
    public function __construct()
    {
        parent::__construct('tokens');
    }

    public function save($argsData, $id = null)
    {
        if ($id) {
            $this->db->update(
                $this->table,
                $argsData,
                ['id' => $id]
            );

            return $id;
        } else {
            $this->db->insert(
                $this->table,
                $argsData
            );

            return $this->db->id();
        }
    }

    public function getAll()
    {
        return $this->db->select(
            $this->table,
            '*',
            [
                    'ORDER' => [
                        'id' => 'DESC',
                    ],
                ]
        );
    }

    public function getBy($key, $value)
    {
        return $this->db->select(
            $this->table,
            '*',
            [
                    $key => $value,
                    'ORDER' => [
                        'id' => 'DESC',
                    ],
                ]
        );
    }

    public function getCount($args = null)
    {

        return $this->db->count(
            $this->table,
            !empty( $args ) ? $args : null
        );
    }


    public function getLinmit($ofset = 0, $limit = 10)
    {
        return $this->db->select(
            $this->table,
            '*',
            [
                'ORDER' => [
                    'id' => 'DESC',
                ],
                "LIMIT" => [$ofset, $limit]
            ]
        );
    }

    public function getLinmitbyType( $ofset = 0, $limit = 10, $type = '' ) {
        return $this->db->select(
            $this->table,
            '*',
            [
                'token_status' => $type,
                'ORDER' => [
                    'id' => 'DESC',
                ],
                "LIMIT" => [$ofset, $limit]
            ]
        );
    }

    public function delete( $args ){
        return $this->db->delete(
            $this->table,
            [
            "AND" => [
                "id" => $args,
            ]
        ]);
    }

    public function queryRand(){

        return $this->db->query(
            'SELECT token FROM avt_tokens WHERE token_status = 1
            ORDER BY RAND()
            LIMIT 1'
        )->fetchAll();

        return $this->db->select(
            $this->table,
            '*',
            [
                'token_status' => 1,
                'ORDER' => [
                    'id' => 'RAND()',
                ],
                "LIMIT" => 1
            ]
        );
    }
}
