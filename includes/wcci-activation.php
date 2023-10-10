<?php
/*
 * File to be executed on activation of the plug-in
 */

 class WCCI_ACTIVATION {
    public function __construct() {
        global $wpdb;
        $table_1 = $wpdb->prefix . "wcci_settings";
        $table_2 = $wpdb->prefix . "wcci_images";
        $this->db_create_tables($table_1, $table_2);
    }

    private function db_create_tables( $a, $b ) {
        global $wpdb;
        require(ABSPATH . 'wp-admin/includes/upgrade.php');

        $tables = $wpdb->tables( 'all', true);

        if ( array_search( $a, $tables, true ) == false && array_search( $b, $tables, true ) == false) {
            // Create both tables
            $query_a = "CREATE TABLE $a (" . 
            "id bigint NOT NULL," .
            "setting_name varchar(200)," .
            "setting_value longtext," . 
            "PRIMARY KEY (id));";
 
            $query_b = "CREATE TABLE $b (".
            "id bigint NOT NULL,".
            "product_id bigint NOT NULL,".
            "image_id varchar(32),".
            "variant_name longtext,".
            "PRIMARY KEY (id));";
 
            dbDelta( [$query_a, $query_b], true );
        } elseif ( array_search( $a, $tables, true ) == $a && array_search( $b, $tables, true ) == false ) {
            // Create table $b
            $query = "CREATE TABLE $b (".
            "id bigint NOT NULL,".
            "product_id bigint NOT NULL,".
            "image_id varchar(32),".
            "variant_name longtext,".
            "PRIMARY KEY (id));";

            dbDelta( $query, true );
        } elseif ( array_search( $a, $tables, true ) == false && array_search( $b, $tables, true ) == $b ) {
            // Create table $a
            $query = "CREATE TABLE $a (" . 
            "id bigint NOT NULL," .
            "setting_name varchar(200)," .
            "setting_value longtext," . 
            "PRIMARY KEY (id));";
             
            dbDelta( $query, true );
        }
    }
 }

 new WCCI_ACTIVATION;