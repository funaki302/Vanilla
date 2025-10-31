Page publication :
 [ok] - data.sql :
       -> [ok] table commentaire 
       -> [ok] table publication

 [ok] - publication.php :
       -> [ok] input pour publier
       -> [ok] input pour commenter
       -> [ok] script -> traitement.php?code=2

 [ok] - function.php :
       -> [ok] set_new_pub ;
       -> [ok] get_all_pub ;
       -> [ok] set_new_comment ;
       -> [ok] get_all_comment_by_pub_id ;

 [] - view.sql:
       -> [] view_publication_commentaire ;

 [] - traitement.php :
       -> [ok] code=2 -> publication 
       -> [] code=3 -> [] commentaire

 [] - commentaire.php :
       -> [] afficher la publication
       -> [] afficher tous les commentaires de cette pub 
 
 [ok] - function.php :
       -> [ok] get_pub_by_id;

 [] - publication.php :
       -> [] ajouter bouton "Commenter" pour chaque pub
