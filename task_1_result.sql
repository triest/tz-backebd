select users.* from user_plan as `user_plan` #
			left join `users` as `users` on `users`.`user_id`=`user_plan`.`user_id`
			left join `users_meta` as  `users_meta` on `users_meta`.`user_id`=`users`.`user_id`
			where `user_plan`.`posts_count`>5 and 
            (`user_plan`.`start` between  DATE_FORMAT(NOW()-INTERVAL 1 YEAR ,'%Y-01-01') AND  DATE_FORMAT(NOW()-INTERVAL 1 YEAR,'%Y-12-31'))  
           and `user_plan`.`plan_id`=19
            and `users_meta`.`meta_name`="user_language" and (`users_meta`.`meta_value`="english" or `users_meta`.`meta_value`="spanish")
            ;

/*
select * from `user_plan` as `user_plan` 
			left join `users` as `usr` on `usr`.`user_id`=`user_plan`.`user_id`
            */