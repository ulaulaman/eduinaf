<?php
#
# widget per le sidebar
#

# didattica
class Widget_Didattica extends WP_Widget {
 
	/** Registrazione del widget */
    public function __construct() {
        parent::__construct(
            'widget_dida', // Base ID
            'Widget Didattica', // Name
            array( 'description' => __( 'Widget per l\'inserimento della sidebar dei contenuti didattici', 'text_domain' ), ) // Args
        );
    }
 
    /** Front-end display of widget */
    public function widget( $args, $instance ) {
        extract( $args );
		$shortcode = do_shortcode('[sbdidattica]');
        echo $shortcode;
        echo $after_widget;
    }
 
    /** Back-end widget form */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Titolo', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Titolo:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
    <?php
    }
 
    /** Ripulisce i valori del widget man mano che vengono salvati */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
} // class Widget_Didattica

// Registra Widget_Didattica
add_action( 'widgets_init', 'register_dida' );
     
function register_dida() { 
    register_widget( 'Widget_Didattica' ); 
}