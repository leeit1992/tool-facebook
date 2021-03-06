<?php
namespace App\Model;

use Atl\Database\Model;

class BuyModel extends Model
{
    public function __construct() {
        parent::__construct('buy');
    }

    public function save( $argsData, $id = null ) {
        if ( $id ) {
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

    public function getCount( $args = null ) {
        return $this->db->count(
            $this->table,
            !empty( $args ) ? $args : null
        );
    }

    public function getBy( $key, $value ) {
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

    public function getByUser( $user = '', $type = '' ) {
        return $this->db->select(
            $this->table,
            '*',
            [
                'buy_user' => $user,
                'buy_type' => $type,
                'ORDER' => [
                    'id' => 'DESC',
                ]
            ]
        );
    }

    /**
     * Handle remove user
     * 
     * @param  int | array $args Data id user
     * @return void
     */
    public function delete( $args ){
        return $this->db->delete(
            $this->table,
            [
            "AND" => [
                "id" => $args,
            ]
        ]);
    }
}
