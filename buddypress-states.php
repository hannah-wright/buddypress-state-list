/*
This will add a BuddyPress profile field with a drop-down list of US states.
Add to bp-custom.php or functions, then head on over to /wp-admin/users.php?page=bp-profile-setup. Enjoy!
*/
 
function bp_add_custom_state_list() {
 
  if ( !xprofile_get_field_id_from_name('State') && 'bp-profile-setup' == $_GET['page'] ) {
 
		$state_list_args = array(
		       'field_group_id'  => 1,
		       'name'            => 'State',
		       'description'	 => 'Please select your State',
		       'can_delete'      => false,
		       'field_order' 	 => 2,
		       'is_required'     => false,
		       'type'            => 'selectbox',
		       'order_by'	 => 'custom'
 
		);
 
		$state_list_id = xprofile_insert_field( $state_list_args );
 
		if ( $state_list_id ) {
 
        $states = array(
	    "Alabama",			
    	    "Alaska",
            "Arizona",
            "Arkansas",
            "California",
            "Colorado",
            "Connecticut",
            "Delaware",
            "District of Columbia",
            "Florida",
            "Georgia",
            "Hawaii",
            "Idaho",
            "Illinois",
            "Indiana",
            "Iowa",
            "Kansas",
            "Kentucky",
            "Louisiana",
            "Maine",
            "Maryland",
            "Massachusetts",
            "Michigan",
            "Minnesota",
            "Mississippi",
            "Missouri",
            "Montana",
            "Nebraska",
            "Nevada",
            "New Hampshire",
            "New Jersey",
            "New Mexico",
            "New York",
            "North Carolina",
            "North Dakota",
            "Ohio",
            "Oklahoma",
            "Oregon",
            "Pennsylvania",
            "Rhode Island",
            "South Carolina",
            "South Dakota",
            "Tennessee",
            "Texas",
            "Utah",
            "Vermont",
            "Virginia",
            "Washington",
            "West Virginia",
            "Wisconsin",
            "Wyoming",
			);
			
			foreach (  $states as $state ) {
				
				xprofile_insert_field( array(
					'field_group_id'	=> 1,
					'parent_id'		=> $state_list_id,
					'type'			=> 'option',
					'name'			=> $state,
					'option_order'   	=> $i++
				));
				
			}
 
		}
	}
}
add_action('bp_init', 'bp_add_custom_state_list');
