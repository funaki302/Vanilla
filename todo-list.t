Page publication :
 [ok] - data.sql :
       -> [ok] table commentaire 
       -> [ok] table publication

 [] - publication.php :
       -> [ok] input pour publier
       -> [ok] input pour commenter
       -> [] script -> traitement.php?code=2

 [] - function.php :
       -> [ok] set_new_pub ;
       -> [ok] get_all_pub ;
       -> [ok] set_new_comment ;
       -> [ok] get_all_comment_by_pub_id ;

 [] - view.sql:
       -> [] view_publication_commentaire ;

 [] - traitement.php :
       -> [] code=2 -> publication + commentaire