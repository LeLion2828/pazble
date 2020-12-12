DROP TABLE uploadproof;
DROP TABLE ratingworkers;
DROP TABLE forgetpwds;
DROP TABLE reply;
DROP TABLE happenings;
DROP TABLE acceptingBid;
DROP TABLE biding;
DROP TABLE boss_post_job;
DROP TABLE jobs;
DROP TABLE profiles;
DROP TABLE users;



CREATE TABLE users(
    user_id int Primary Key AUTO_INCREMENT,
    Firstname varchar(200) not null,
    Lastname varchar(200) not null,
    countryCode varchar(10) not null,
    phone varchar(200) UNIQUE Not null,
    password varchar(255) not null,
    usertype varchar(200),
    gravatar varchar(255),
    verify_code varchar(200) UNIQUE Not null,
    status_check boolean Not NULL
);



CREATE TABLE profiles(
  profile_id int Primary Key AUTO_INCREMENT,
  service varchar(200) not null,
  category varchar(200) not null,
  description varchar(255) not null,
  rate varchar(255) not null,
  user_id int UNIQUE not null,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);




CREATE TABLE jobs(
  job_id int Primary key AUTO_INCREMENT,
  title varchar(200),
  Description varchar(200),
  Address varchar(255),
  Status boolean
);


CREATE TABLE boss_post_job(
  postjob_id int Primary key AUTO_INCREMENT,
  job_id int,
  user_id int,
  date_posted varchar(100),
  Foreign key (job_id) References jobs(job_id),
  Foreign key (user_id) References users(user_id)
);


CREATE TABLE biding(
  bid_id int Primary key AUTO_INCREMENT,
  user_id int,
  job_id int,
  bid_price varchar(200),
  postjob_id int,
  Foreign key (job_id) References jobs(job_id),
  Foreign key (user_id) References users(user_id),
  Foreign key (postjob_id) References boss_post_job(postjob_id)
);


CREATE UNIQUE INDEX bid_unique ON biding(user_id,job_id,postjob_id);

CREATE TABLE acceptingBid(
AcceptingBid_id int Primary key AUTO_INCREMENT,
bid_id int,
user_id int,
Foreign key (bid_id) References biding(bid_id),
Foreign key (user_id) References users(user_id)

);



CREATE TABLE happenings(
  hapen_id int Primary Key AUTO_INCREMENT,
  comments varchar(255),
  posted_time varchar(255),
  user_id int,
  Foreign key (user_id) References users(user_id)
);


CREATE TABLE reply(
  reply_id int Primary Key AUTO_INCREMENT,
  reply_message varchar(255),
  hapen_id int,
  replyuserid int,
  time_reply varchar(255),
  Foreign key (hapen_id) References happenings(hapen_id),
  Foreign key (replyuserid) References users(user_id)
);


CREATE TABLE forgetpwds(
  forgetpwd_id int Primary Key AUTO_INCREMENT,
  mobile_num varchar(200) UNIQUE,
  user_id int,
  code varchar(10),
  Foreign Key (user_id) References users(user_id)
);



CREATE TABLE ratingworkers(
  rate_id int Primary Key AUTO_INCREMENT,
  worker_id int,
  rating int,
  Foreign key (worker_id) References users(user_id)
);



CREATE TABLE uploadproof(
  uploadproof_id int Primary key AUTO_INCREMENT,
  paths varchar(255),
  status_proof boolean NOT NULL,
  user_id int,
  Foreign key (user_id) References users(user_id)
);