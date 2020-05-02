Create database diary;

Create table users(
	user_id int(100) primary key,
	user_first varchar(255),
	user_last varchar(255),
	user_uid varchar(255),
	user_email varchar(255),
	user_pwd varchar(10000)
);

Create table diary(
	diary_id int(100) primary key,
	user_uid varchar(255),
	diary_title varchar(255),
	diary_date varchar(255),
	diary_category varchar(255),
	diary_content varchar(1000)
);

Create table feedback(
	feedback_id int(100) primary key,
	user_uid varchar(255),
	experience varchar(255),
	comments varchar(1000)
);

Create table images(
	image_id int(100) primary key,
	user_uid varchar(255),
	image varchar(255),
	name varchar(255)
);

Create table profile(
	user_uid varchar(255),
	user_dob varchar(255),
	user_phone varchar(255)
);

Create table todolist(
	user_uid varchar(255),
	task varchar(255)
);

