<?php
/**
 * CTA post type
 */
if ( !class_exists('CTA_Call_To_Action_Post_Type') ) {

class CTA_Call_To_Action_Post_Type {

	function __construct() {
		self::load_hooks();
	}

	private function load_hooks() {

		add_action('admin_init', array(__CLASS__,	'rebuild_permalinks'));
		add_action('init', array(__CLASS__, 'register_post_type'));
		add_action('init', array(__CLASS__, 'register_category_taxonomy'));

		/* Load Admin Only Hooks */
		if (is_admin()) {

			/* Register Columns */
			add_filter( 'manage_wp-call-to-action_posts_columns', array(__CLASS__, 'register_columns'));

			/* Prepare Column Data */
			add_action( "manage_posts_custom_column", array(__CLASS__, 'prepare_column_data'), 10, 2 );

			/* Define Sortable Columns */
			add_filter( 'manage_edit_wp-call-to-action_sortable_columns', array(__CLASS__, 'define_sortable_columns'));

			/* Filter Row Actions */
			add_filter( 'post_row_actions', array(__CLASS__, 'filter_row_actions'), 10, 2 );

			/* Add Category Filter */
			add_action( 'restrict_manage_posts', array(	__CLASS__ ,'add_category_taxonomy_filter'));

			/* Add Query Parsing for Filter */
			add_filter( 'parse_query' ,	array(__CLASS__, 'convert_id_to_slug'));

			/* Change the title of the excerpt box to 'summary' */
			add_action( 'admin_init', array(__CLASS__, 'change_excerpt_to_summary'));
		}

	}

	/* Rebuilds permalinks after activation */
	public static function rebuild_permalinks() {
		$activation_check = get_option('wp_cta_activate_rewrite_check',0);

		if ($activation_check) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
			update_option( 'wp_cta_activate_rewrite_check', '0');
		}
	}


	public static function register_post_type() {

		$slug = get_option( 'wp-cta-main-wp-call-to-action-permalink-prefix', 'cta' );

		$labels = array(
			'name' => __('Call to Action', 'inbound-pro' ),
			'singular_name' => __('Call to Action', 'inbound-pro' ),
			'add_new' => __('Add New', 'inbound-pro' ),
			'add_new_item' => __('Add New Call to Action', 'inbound-pro' ),
			'edit_item' => __('Edit Call to Action', 'inbound-pro' ),
			'new_item' => __('New Call to Action', 'inbound-pro' ),
			'view_item' => __('View Call to Action', 'inbound-pro' ),
			'search_items' => __('Search Call to Action', 'inbound-pro' ),
			'not_found' =>	__('Nothing found', 'inbound-pro' ),
			'not_found_in_trash' => __('Nothing found in Trash', 'inbound-pro' ),
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => '',
			'rewrite' => array("slug" => "$slug"),
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 33,
			'show_in_nav_menus'	=> false,
			'supports' => array('title', 'thumbnail', 'editor')
		);

		register_post_type( 'wp-call-to-action', $args );

		/*flush_rewrite_rules( false );*/


	}

	/* Register Category Taxonomy */
	public static function register_category_taxonomy() {

		register_taxonomy('wp_call_to_action_category','wp-call-to-action', array(
				'hierarchical' => true,
				'label' => __( 'Categories', 'inbound-pro' ),
				'singular_label' => __( 'Call to Action Category', 'inbound-pro' ),
				'show_ui' => true,
				'show_in_nav_menus'	=> false,
				'query_var' => true,
				"rewrite" => true
		));

	}

	/* Register Columns */
	public static function register_columns( $cols ) {

		$cols = array(
			"cb" => "<input type=\"checkbox\" />",
			"thumbnail-cta" => __( 'Preview', 'inbound-pro' ),
			"title" => __( 'Call to Action Title', 'inbound-pro' ),
			"cta_stats" => __( 'Variation Testing Stats', 'inbound-pro' ),
			"cta_impressions" => __( 'Total<br>Impressions', 'inbound-pro' ),
			"cta_actions" => __( 'Total<br>Conversions', 'inbound-pro' ),
			"cta_cr" => __( 'Total<br>Click Through Rate', 'inbound-pro' )
		);

		return $cols;

	}

	/* Prepare Column Data */
	public static function prepare_column_data( $column, $post_id ) {
		global $post;

		if ($post->post_type !='wp-call-to-action') {
			return $column;
		}

		if ("ID" == $column){
			echo $post->ID;
		} else if ("title" == $column) {
		} else if ("author" == $column) {
		} else if ("date" == $column)	{
		} else if ("thumbnail-cta" == $column) {
			$permalink = get_permalink($post->ID);
			$local = array('127.0.0.1', "::1");
			if(!in_array($_SERVER['REMOTE_ADDR'], $local)){
				$thumbnail = 'http://s.wordpress.com/mshots/v1/' . urlencode(esc_url($permalink)) . '?w=140';
			} else {
				$template = CTA_Variations::get_current_template($post->ID);
				$thumbnail = CTA_Variations::get_template_thumbnail($template);
			}

			echo "<a title='". __('Click to Preview', 'inbound-pro' ) ."' class='thickbox' href='".$permalink."&inbound_popup_preview=on&post_id=".$post->ID."&TB_iframe=true&width=640&height=703' target='_blank'><img src='".$thumbnail."' style='width:150px;height:110px;' title='Click to Preview'></a>";

		} elseif ("cta_stats" == $column) {
			self::show_stats_data();
		} elseif ("cta_impressions" == $column) {
			echo self::show_aggregated_stats("cta_impressions");

		} elseif ("cta_actions" == $column) {
			echo self::show_aggregated_stats("cta_actions");
		} elseif ("cta_cr" == $column) {
			echo self::show_aggregated_stats("cta_cr") . "%";
		} elseif ("template" == $column) {
			$template_used = get_post_meta($post->ID, 'wp-cta-selected-template', true);
			echo $template_used;
		}
	}

	/* Define Sortable Columns */
	public static function define_sortable_columns($columns) {

		return array(
			'title' 			=> 'title',
			'impressions'		=> 'impressions',
			'actions'			=> 'actions',
			'cr'				=> 'cr'
		);

	}

	/* Define Row Actions */
	public static function filter_row_actions( $actions, $post ) {

		if ($post->post_type=='wp-call-to-action') {
			$actions['clear'] = '<a href="#clear-stats" id="wp_cta_clear_'.$post->ID.'" class="clear_stats" title="'
			. __( 'Clear impression and conversion records', 'inbound-pro' )
			. '" >' .	__( 'Clear All Stats', 'cta') . '</a>';

			/* show shortcode */
			$actions['clear'] .= '<br><span style="color:#000;">' . __( 'Shortcode:', 'inbound-pro' ) .'</span> <input type="text" style="width: 60%; text-align: center; margin-top:10px;" class="regular-text code short-shortcode-input" readonly="readonly" id="shortcode" name="shortcode" value="[cta id=\''.$post->ID.'\']">';
		}

		return $actions;

	}

	/* Adds ability to filter email templates by custom post type */
	public static function add_category_taxonomy_filter() {
		global $post_type;

		if ($post_type === "wp-call-to-action") {
			$post_types = get_post_types( array( '_builtin' => false ));

			if ( in_array( $post_type, $post_types ) ) {

				$filters = get_object_taxonomies( $post_type );
				foreach ( $filters as $tax_slug ) {
					$tax_obj = get_taxonomy( $tax_slug );
					(isset($_GET[$tax_slug])) ? $current = $_GET[$tax_slug] : $current = 0;
					wp_dropdown_categories( array(
						'show_option_all' => __('Show All '.$tax_obj->label ),
						'taxonomy' 		=> $tax_slug,
						'name' 			=> $tax_obj->name,
						'orderby' 		=> 'name',
						'selected' 		=> $current,
						'hierarchical' 		=> $tax_obj->hierarchical,
						'show_count' 		=> false,
						'hide_empty' 		=> true
					));
				}
			}
		}
	}

	/* Convert Taxonomy ID to Slug for Filter Serch */
	public static function convert_id_to_slug($query) {
		global $pagenow;
		$qv = &$query->query_vars;
		if( $pagenow=='edit.php' && isset($qv['wp_call_to_action_category']) && is_numeric($qv['wp_call_to_action_category']) ) {
			$term = get_term_by('id',$qv['wp_call_to_action_category'],'wp_call_to_action_category');
			$qv['wp_call_to_action_category'] = $term->slug;
		}
	}

	/* Changes the title of Excerpt meta box to Summary */
	public static function change_excerpt_to_summary() {
		$post_type = "wp-call-to-action";
		if ( post_type_supports($post_type, 'excerpt') ) {
			add_meta_box('postexcerpt', __( 'Short Description', 'inbound-pro' ), 'post_excerpt_meta_box', $post_type, 'normal', 'core');
		}
	}

	public static function show_stats_data() {
		global $post, $CTA_Variations;

		$permalink = get_permalink($post->ID);
		$variations = $CTA_Variations->get_variations( $post->ID );

		$admin_url = admin_url();
		$admin_url = str_replace('?frontend=false','',$admin_url);

		if ($variations) {
			/*echo "<b>".$wp_cta_impressions."</b> visits"; */
			echo "<span class='show-stats button'>". __( 'Show Variation Stats', 'inbound-pro' ) ."</span>";
			echo "<ul class='wp-cta-varation-stat-ul'>";

			$first_status = get_post_meta($post->ID,'wp_cta_ab_variation_status', true); /* Current status */
			$first_notes = get_post_meta($post->ID,'wp-cta-variation-notes', true);
			$cr_array = array();
			$i = 0;
			$impressions = 0;
			$conversions = 0;
			foreach ($variations as $vid => $variation)
			{
				$letter = $CTA_Variations->vid_to_letter( $post->ID, $vid ); /* convert to letter */
				$each_impression = get_post_meta($post->ID,'wp-cta-ab-variation-impressions-'.$vid, true); /* get impressions */
				$v_status = get_post_meta($post->ID,'cta_ab_variation_status_'.$vid, true); /* Current status */

				if ($i === 0) { $v_status = $first_status; } /* get status of first */

				$v_status = (($v_status === "")) ? "1" : $v_status; /* Get on/off status */

				$each_notes = get_post_meta($post->ID,'wp-cta-variation-notes-'.$vid, true); /* Get Notes */

				if ($i === 0) { $each_notes = $first_notes; } /* Get first notes */

				$each_conversion = get_post_meta($post->ID,'wp-cta-ab-variation-conversions-'.$vid, true);
				$final_conversion = (($each_conversion === "")) ? 0 : $each_conversion;

				$impressions += get_post_meta($post->ID,'wp-cta-ab-variation-impressions-'.$vid, true);

				$conversions += get_post_meta($post->ID,'wp-cta-ab-variation-conversions-'.$vid, true);

				if ($each_impression != 0) {
					$conversion_rate = $final_conversion / $each_impression;
				} else {
					$conversion_rate = 0;
				}

				$conversion_rate = round($conversion_rate,2) * 100;
				$cr_array[] = $conversion_rate;

				if ($v_status === "0") {
					$final_status = __( '(Paused)', 'inbound-pro' );
				} else {
					$final_status = "";
				}
				/*if ($cr_array[$i] > $largest) {
				$largest = $cr_array[$i];
				}
				(($largest === $conversion_rate)) ? $winner_class = 'wp-cta-current-winner' : $winner_class = ""; */
				$c_text = (($final_conversion === "1")) ? 'conversion' : "conversions";
				$i_text = (($each_impression === "1")) ? 'view' : "views";
				$each_notes = (($each_notes === "")) ? 'No notes' : $each_notes;
				$data_letter = "data-letter=\"".$letter."\"";

				$popup = "data-notes=\"<span class='wp-cta-pop-description'>".$each_notes."</span><span class='wp-cta-pop-controls'><span class='wp-cta-pop-edit button-primary'><a href='".$admin_url."post.php?post=".$post->ID."&wp-cta-variation-id=".$vid."&action=edit'>Edit This Varaition</a></span><span class='wp-cta-pop-preview button'><a title='Click to Preview this variation' class='thickbox' href='".$permalink."&inbound_popup_preview=on&post_id=".$post->ID."&TB_iframe=true&width=640&height=703' target='_blank'>Preview This Varaition</a></span><span class='wp-cta-bottom-controls'><span class='wp-cta-delete-var-stats' data-letter='".$letter."' data-vid='".$vid."' rel='".$post->ID."'>Clear These Stats</span></span></span>\"";

				echo "<li rel='".$final_status."' data-postid='".$post->ID."' data-letter='".$letter."' data-wp-cta='' class='wp-cta-stat-row-".$vid." ".$post->ID. '-'. $conversion_rate ." status-".$v_status. "'><a ".$popup." ".$data_letter." class='wp-cta-letter' title='click to edit this variation' href='".$admin_url."/wp-admin/post.php?post=".$post->ID."&wp-cta-variation-id=".$vid."&action=edit'>" . $letter . "</a><span class='wp-cta-numbers'> <span class='wp-cta-visits'><span class='visit-text'>".$i_text." </span><span class='wp-cta-impress-num'>" . $each_impression . "</span></span> <span class='wp-cta-converstions'><span class='conversion_txt'>".$c_text."</span><span class='wp-cta-con-num'>". $final_conversion . "</span> </span> </span><a ".$popup." ".$data_letter." class='cr-number cr-empty-".$conversion_rate."' href='/wp-admin/post.php?post=".$post->ID."&wp-cta-variation-id=".$vid."&action=edit'>". $conversion_rate . "%</a></li>";
				$i++;
			}
			echo "</ul>";

			$winning_cr = max($cr_array); /* best conversion rate */

			if ($winning_cr != 0) {
			echo "<span class='variation-winner-is'>".$post->ID. "-".$winning_cr."</span>";
			}
			/*echo "Total Visits: " . $impressions; */
			/*echo "Total Conversions: " . $conversions; */
		} else {
			$notes = get_post_meta($post->ID,'wp-cta-variation-notes', true); /* Get Notes */
			$cr = self::show_aggregated_stats("cta_cr");
			(($notes === "")) ? $notes = 'No notes' : $notes = $notes;
			$popup = "data-notes=\"<span class='wp-cta-pop-description'>".$notes."</span><span class='wp-cta-pop-controls'><span class='wp-cta-pop-edit button-primary'><a href='".$admin_url."post.php?post=".$post->ID."&wp-cta-variation-id=0&action=edit'>Edit This Varaition</a></span><span class='wp-cta-pop-preview button'><a title='Click to Preview this variation' class='thickbox' href='".$permalink."?wp-cta-variation-id=0&inbound_popup_preview=on&post_id=".$post->ID."&TB_iframe=true&width=640&height=703' target='_blank'>Preview This Varaition</a></span><span class='wp-cta-bottom-controls'><span class='wp-cta-delete-var-stats' data-letter='A' data-vid='0' rel='".$post->ID."'>Clear These Stats</span></span></span>\"";

			echo "<ul class='wp-cta-varation-stat-ul'><li rel='' data-postid='".$post->ID."' data-letter='A' data-wp-cta=''><a ".$popup." data-letter=\"A\" class='wp-cta-letter' title='click to edit this variation' href='".$admin_url."post.php?post=".$post->ID."&wp-cta-variation-id=0&action=edit'>A</a><span class='wp-cta-numbers'> <span class='wp-cta-impress-num'>" . self::show_aggregated_stats("cta_impressions") . "</span><span class='visit-text'>visits</span><span class='wp-cta-con-num'>". self::show_aggregated_stats("cta_actions") . "</span> conversions</span><a class='cr-number cr-empty-".$cr."' href='".$admin_url."post.php?post=".$post->ID."&wp-cta-variation-id=0&action=edit'>". $cr . "%</a></li></ul>";
			echo "<div class='no-stats-yet'>". __( 'No A/B Tests running for this landing page.', 'inbound-pro' ) ." <a href='/wp-admin/post.php?post=".$post->ID."&wp-cta-variation-id=1&action=edit&new-variation=1&wp-cta-message=go'>Start one</a></div>";

		}
	}

	/* Needs Documentation */
	public static function show_aggregated_stats($type_of_stat) {
		global $post, $CTA_Variations;

		$variations = $CTA_Variations->get_variations($post->ID);


		$impressions = 0;
		$conversions = 0;

		foreach ($variations as $vid => $variation) {
			$impressions +=  $CTA_Variations->get_impressions( $post->ID, $vid );
			$conversions +=  $CTA_Variations->get_conversions( $post->ID, $vid );
		}

		if ($type_of_stat === "cta_actions") {
			return $conversions;
		}
		if ($type_of_stat === "cta_impressions") {
			return $impressions;
		}
		if ($type_of_stat === "cta_cr") {
			if ($impressions != 0) {
				$conversion_rate = $conversions / $impressions;

			} else {
				$conversion_rate = 0;
			}

			$conversion_rate = round($conversion_rate,2) * 100;

			return $conversion_rate;
		}
	}


	/* Clears stats of all CTAs	*/
	public static function clear_all_cta_stats() {
		$ctas = get_posts( array(
			'post_type' => 'wp-call-to-action',
			'posts_per_page' => -1
		));


		foreach ($ctas as $cta) {
			CTA_Call_To_Action_Post_Type::clear_cta_stats( $cta->ID );
		}
	}

	/* Clears stats of a single CTA
	*
	* @param	cta_id INT of call to action
	*/
	public static function clear_cta_stats( $cta_id ) {
		global $CTA_Variations;

		$variations = $CTA_Variations->get_variations($cta_id);
		if ($variations) {
			foreach ( $variations as $vid => $variation ) {
				add_post_meta( $cta_id, 'wp-cta-ab-variation-impressions-'.$vid, 0, true ) or update_post_meta( $cta_id, 'wp-cta-ab-variation-impressions-'.$vid, 0 );
				add_post_meta( $cta_id, 'wp-cta-ab-variation-conversions-'.$vid, 0, true ) or update_post_meta( $cta_id, 'wp-cta-ab-variation-conversions-'.$vid, 0 );
			}

		} else {
			add_post_meta( $cta_id, 'wp-cta-ab-variation-impressions-0', 0, true ) or update_post_meta( $cta_id, 'wp-cta-ab-variation-impressions-0', 0 );
			add_post_meta( $cta_id, 'wp-cta-ab-variation-conversions-0', 0, true ) or update_post_meta( $cta_id, 'wp-cta-ab-variation-conversions-0', 0 );
		}
	}

	/* Clears stats for CTA variation given CTA & Variation ID
	*
	* @param cta_id INI
	* @param variation_id INT
	*
	*/
	public static function clear_cta_variation_stats( $cta_id = 0, $variation_id = 0 ) {

		add_post_meta( $cta_id, 'wp-cta-ab-variation-impressions-'.$variation_id, 0, true ) or update_post_meta( $cta_id, 'wp-cta-ab-variation-impressions-'.$variation_id, 0 );
		add_post_meta( $cta_id, 'wp-cta-ab-variation-conversions-'.$variation_id, 0, true ) or update_post_meta( $cta_id, 'wp-cta-ab-variation-conversions-'.$variation_id, 0 );

	}
}

/* Load Post Type Pre Init */
$GLOBALS['CTA_Call_To_Action_Post_Type'] = new CTA_Call_To_Action_Post_Type();

}