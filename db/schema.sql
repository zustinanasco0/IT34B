create table if not exists activity_logs(
    activity_log_id int auto_increment primary key,
    user_id varchar(50),
    user_email varchar(50),
    activity_log_action varchar(50) not null,
    activity_log_status enum('success', 'failed') default 'success',


    -- client parameters
    activity_log_ip_address varchar(45),
    activity_log_user_agent varchar(255),

    -- timestamp
    activity_log_created_at timestamp default current_timestamp;

);