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
       -> [] code=2 -> [ok]publication + commentaire