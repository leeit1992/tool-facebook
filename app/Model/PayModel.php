<?php
namespace App\Model;

use Atl\Database\Model;

class PayModel extends Model
{
    public function __construct() {
        parent::__construct('banks');
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

    public function getAll() {
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

    public function getCount( $args = null ) {
        return $this->db->count(
            $this->table,
            !empty( $args ) ? $args : null
        );
    }

    public function getLinmit( $ofset = 0, $limit = 10 ) {
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

    /**
     * Handle remove pay
     * 
     * @param  int | array $args Data id pay
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

    /**
     * Handle search by key
     * 
     * @param  string $key  Key search value.
     * @return void
     */
    public function searchBy( $key ){
        return $listPay =  $this->db->select(
            $this->table,
            '*',
            [
                "OR" => [
                        "bank_name[~]" => $key,
                        "bank_user_name[~]" => $key,
                        "bank_number[~]" => $key,
                    ],
                'ORDER' => [
                    'id' => 'DESC',
                ],
            ]
        );
    }
}
