<?php

/**
 * @author: Codinmasster
 */
class WordpressSampleModel {

    const TABLE_NAME = '<some table name>';
    const TABLE_PREFIX = '<some prefix>_';

    private $db;

    public function __construct() {
        global $wpdb;

        $this->db = $wpdb;
    }

    public function get_table_name() {
        return $this->db->prefix . self::TABLE_PREFIX . self::TABLE_NAME;
    }

    public function create_sidebar_table() {
        $charset_collate = $this->db->get_charset_collate();
        $table_name = $this->get_table_name();
        if ($this->db->get_var('SHOW TABLES LIKE "' . $table_name . '"') != $table_name) {
            /*
             * YOUR TABLE SCHEMA GOES HERE
              CREATE TABLE {$table_name} (

              ) {$charset_collate};
             */
            $sql = "";

            if ($sql) {
                include_once( ABSPATH . "wp-admin/includes/upgrade.php" );
                dbDelta($sql);
            }
        }
    }

    public function get_records($where = "") {
        $table_name = $this->get_table_name();
        $sql = "
		SELECT *
		FROM {$table_name}
		{$where}
	    ";

        return $this->db->get_results($sql, OBJECT_K);
    }

    public function insert_record($data = array()) {
        $table_name = $this->get_table_name();
        $this->db->insert($table_name, $data);

        return $this->db->insert_id;
    }

    public function update_record($data = array(), $where = array()) {
        $table_name = $this->get_table_name();
        $this->db->update($table_name, $data, $where);
    }

}
