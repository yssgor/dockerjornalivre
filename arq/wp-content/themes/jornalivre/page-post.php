<?php require_once 'header.php'; ?>

<!-- FORMULARIO PARA CADASTRO DE UMA NOVA POSTAGEM -->
<div class="formulario-post">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo</label>
        <input name="titulo" type="text" id="titulo" class="input-post" required>

        <label for="linha-fina">Linha fina</label>
        <input name="linha-fina" type="text" id="linha-fina" class="input-post" required>

        <input type="file" name="img" size="25" />

        <label for="conteudo">Texto da reportagem</label>
        <textarea name="conteudo" id="conteudo-post" cols="100" rows="30"></textarea>

        <input class="enviar" type="submit" name="enviar" value="Post">

    </form>
</div>

<?php

    #Cadastro de um novo post com as informações no formato texto
    if(isset($_POST['enviar'])){
        $post_titulo = $_POST['titulo'];
        $post_desc = $_POST['linha-fina'];
        $post_conteudo = $_POST['conteudo'];

        $novo_post = array(
            'post_content' => $post_conteudo,
            'post_title' => $post_titulo,
            'post_excerpt' => $post_desc,
            'post_status' => 'publish'
        );

        $post_id = wp_insert_post($novo_post);


        #referencia: https://rudrastyh.com/wordpress/how-to-add-images-to-media-library-from-uploaded-files-programmatically.html
        #upload de imagem no wordpress
        require( dirname(__FILE__) . '/../../../wp-load.php' );

        $wp_dir = wp_upload_dir();
        $i = 1; 
        $image = $_FILES['img'];
        $new_file_path = $wp_dir['path'] . '/' . $image['name'];
        $new_file_mime = mime_content_type( $image['tmp_name'] );
            
        while( file_exists( $new_file_path ) ) {
            $i++;
            $new_file_path = $wp_dir['path'] . '/' . $i . '_' . $image['name'];
        }

    
        if( move_uploaded_file( $image['tmp_name'], $new_file_path ) ) {
            
            #cadastro da imagem no wordpress.
            $upload_id = wp_insert_attachment( array(
                'guid'           => $new_file_path, 
                'post_mime_type' => $new_file_mime,
                'post_title'     => preg_replace( '/\.[^.]+$/', '', $image['name'] ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ), $new_file_path );

            require_once( ABSPATH . 'wp-admin/includes/image.php' );

            wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
            
            #inserindo a imagem na thumbnail do post
            set_post_thumbnail( $post_id, $upload_id ); 

        }
    }


?>


<?php require_once 'footer.php'; ?>