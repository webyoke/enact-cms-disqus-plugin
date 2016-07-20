<?php
namespace Disqus\field;

class Comments extends \Enact\template\wrapper\BaseFieldWrapper {



    public function __toString(){
        return $this->commentsHtml(); 
    }//__toString



    public function areTurnedOn(){
        return $this->field['field_value'] == 'on';
    }//areTurnedOn



    public function commentsHtml(){

        return $this->render('@disqus/comments');

    }//commentsHtml



    public function commentsCount(){

        return $this->render('@disqus/comment-count-link');
       
    }//commentsCount



    public function render($template){

        if(!$this->areTurnedOn()){
            return '';
        }//if

        $shortcode = \DisqusPlugin::instance()->getSiteShortCode();

        if(!$shortcode){
            return '<div>In order to use disqus you need to <a href="' . \DisqusPlugin::instance()->configUri() . '">set up your configuration</a></div>';
        }//if

        return \Template::build($template, Array(
            'id'        => $this->entry['id'],
            'url'       => $this->entry['url'],
            'shortcode' => $shortcode
        ));
       
    }//render




}//Comments
