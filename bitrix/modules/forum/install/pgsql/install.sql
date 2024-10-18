
CREATE TABLE b_forum (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_GROUP_ID int,
  NAME varchar(255) NOT NULL,
  DESCRIPTION text,
  SORT int NOT NULL DEFAULT '150',
  ACTIVE char(1) NOT NULL DEFAULT 'Y',
  ALLOW_HTML char(1) NOT NULL DEFAULT 'N',
  ALLOW_ANCHOR char(1) NOT NULL DEFAULT 'Y',
  ALLOW_BIU char(1) NOT NULL DEFAULT 'Y',
  ALLOW_IMG char(1) NOT NULL DEFAULT 'Y',
  ALLOW_VIDEO char(1) NOT NULL DEFAULT 'Y',
  ALLOW_LIST char(1) NOT NULL DEFAULT 'Y',
  ALLOW_QUOTE char(1) NOT NULL DEFAULT 'Y',
  ALLOW_CODE char(1) NOT NULL DEFAULT 'Y',
  ALLOW_FONT char(1) NOT NULL DEFAULT 'Y',
  ALLOW_SMILES char(1) NOT NULL DEFAULT 'Y',
  ALLOW_UPLOAD char(1) NOT NULL DEFAULT 'N',
  ALLOW_TABLE char(1) NOT NULL DEFAULT 'N',
  ALLOW_ALIGN char(1) NOT NULL DEFAULT 'Y',
  ALLOW_UPLOAD_EXT varchar(255),
  ALLOW_MOVE_TOPIC char(1) NOT NULL DEFAULT 'Y',
  ALLOW_TOPIC_TITLED char(1) NOT NULL DEFAULT 'N',
  ALLOW_NL2BR char(1) NOT NULL DEFAULT 'N',
  ALLOW_SIGNATURE char(1) NOT NULL DEFAULT 'Y',
  PATH2FORUM_MESSAGE varchar(255),
  ASK_GUEST_EMAIL char(1) NOT NULL DEFAULT 'N',
  USE_CAPTCHA char(1) NOT NULL DEFAULT 'N',
  INDEXATION char(1) NOT NULL DEFAULT 'Y',
  DEDUPLICATION char(1) NOT NULL DEFAULT 'Y',
  MODERATION char(1) NOT NULL DEFAULT 'N',
  ORDER_BY char(1) NOT NULL DEFAULT 'P',
  ORDER_DIRECTION varchar(4) NOT NULL DEFAULT 'DESC',
  LID char(2) NOT NULL DEFAULT 'ru',
  TOPICS int NOT NULL DEFAULT '0',
  POSTS int NOT NULL DEFAULT '0',
  LAST_POSTER_ID int,
  LAST_POSTER_NAME varchar(255),
  LAST_POST_DATE timestamp,
  LAST_MESSAGE_ID int8,
  POSTS_UNAPPROVED int DEFAULT '0',
  ABS_LAST_POSTER_ID int,
  ABS_LAST_POSTER_NAME varchar(255),
  ABS_LAST_POST_DATE timestamp,
  ABS_LAST_MESSAGE_ID int8,
  EVENT1 varchar(255) DEFAULT 'forum',
  EVENT2 varchar(255) DEFAULT 'message',
  EVENT3 varchar(255),
  HTML varchar(255),
  XML_ID varchar(255),
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_sort ON b_forum (sort);
CREATE INDEX ix_b_forum_active ON b_forum (active);
CREATE INDEX ix_b_forum_forum_group_id ON b_forum (forum_group_id);

CREATE TABLE b_forum_topic (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_ID int NOT NULL,
  TOPIC_ID int8,
  TITLE varchar(255) NOT NULL,
  TITLE_SEO varchar(255),
  TAGS varchar(255),
  DESCRIPTION varchar(255),
  ICON varchar(255),
  STATE char(1) NOT NULL DEFAULT 'Y',
  APPROVED char(1) NOT NULL DEFAULT 'Y',
  SORT int NOT NULL DEFAULT '150',
  VIEWS int NOT NULL DEFAULT '0',
  USER_START_ID int,
  USER_START_NAME varchar(255),
  START_DATE timestamp NOT NULL,
  POSTS int NOT NULL DEFAULT '0',
  POSTS_SERVICE int NOT NULL DEFAULT '0',
  LAST_POSTER_ID int,
  LAST_POSTER_NAME varchar(255) NOT NULL,
  LAST_POST_DATE timestamp NOT NULL,
  LAST_MESSAGE_ID int8,
  POSTS_UNAPPROVED int DEFAULT '0',
  ABS_LAST_POSTER_ID int,
  ABS_LAST_POSTER_NAME varchar(255),
  ABS_LAST_POST_DATE timestamp,
  ABS_LAST_MESSAGE_ID int8,
  XML_ID varchar(255),
  HTML text,
  SOCNET_GROUP_ID int,
  OWNER_ID int,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_topic_forum_id_approved ON b_forum_topic (forum_id, approved);
CREATE INDEX ix_b_forum_topic_approved ON b_forum_topic (approved);
CREATE INDEX ix_b_forum_topic_abs_last_post_date ON b_forum_topic (abs_last_post_date);
CREATE INDEX ix_b_forum_topic_last_post_date ON b_forum_topic (last_post_date);
CREATE INDEX ix_b_forum_topic_user_start_id ON b_forum_topic (user_start_id);
CREATE INDEX ix_b_forum_topic_last_poster_id ON b_forum_topic (last_poster_id);
CREATE INDEX ix_b_forum_topic_start_date_user_start_id ON b_forum_topic (start_date, user_start_id);
CREATE INDEX ix_b_forum_topic_xml_id ON b_forum_topic (xml_id);
CREATE INDEX ix_b_forum_topic_forum_id_title_seo ON b_forum_topic (forum_id, title_seo);
CREATE INDEX ix_b_forum_topic_title_seo ON b_forum_topic (title_seo);
CREATE INDEX ix_b_forum_topic_owner_id ON b_forum_topic (owner_id);

CREATE TABLE b_forum_message (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_ID int NOT NULL,
  TOPIC_ID int8 NOT NULL,
  USE_SMILES char(1) NOT NULL DEFAULT 'Y',
  NEW_TOPIC char(1) NOT NULL DEFAULT 'N',
  APPROVED char(1) NOT NULL DEFAULT 'Y',
  SOURCE_ID varchar(255) NOT NULL DEFAULT 'WEB',
  POST_DATE timestamp NOT NULL,
  POST_MESSAGE text,
  POST_MESSAGE_HTML text,
  POST_MESSAGE_FILTER text,
  POST_MESSAGE_CHECK char(32),
  ATTACH_IMG int,
  PARAM1 varchar(2),
  PARAM2 int,
  AUTHOR_ID int,
  AUTHOR_NAME varchar(255),
  AUTHOR_EMAIL varchar(255),
  AUTHOR_IP varchar(255),
  AUTHOR_REAL_IP varchar(128),
  GUEST_ID int,
  EDITOR_ID int,
  EDITOR_NAME varchar(255),
  EDITOR_EMAIL varchar(255),
  EDIT_REASON text,
  EDIT_DATE timestamp,
  XML_ID varchar(255),
  HTML text,
  MAIL_HEADER text,
  SERVICE_TYPE smallint,
  SERVICE_DATA text,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_message_forum_id_approved ON b_forum_message (forum_id, approved);
CREATE INDEX ix_b_forum_message_forum_id_topic_id ON b_forum_message (forum_id, topic_id);
CREATE INDEX ix_b_forum_message_topic_id_approved ON b_forum_message (topic_id, approved);
CREATE INDEX ix_b_forum_message_author_id_approved_forum_id ON b_forum_message (author_id, approved, forum_id);
CREATE INDEX ix_b_forum_message_approved ON b_forum_message (approved);
CREATE INDEX ix_b_forum_message_param2 ON b_forum_message (param2);
CREATE INDEX ix_b_forum_message_xml_id ON b_forum_message (xml_id);
CREATE INDEX ix_b_forum_message_post_date_author_id ON b_forum_message (post_date, author_id);
CREATE INDEX ix_b_forum_message_author_id_topic_id ON b_forum_message (author_id, topic_id);
CREATE INDEX ix_b_forum_message_author_id_forum_id_id_approved_topic_id ON b_forum_message (author_id, forum_id, id, approved, topic_id);
CREATE INDEX ix_b_forum_message_service_type ON b_forum_message (service_type);

CREATE TABLE b_forum_file (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_ID int,
  TOPIC_ID int,
  MESSAGE_ID int,
  FILE_ID int NOT NULL,
  USER_ID int,
  TIMESTAMP_X timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  HITS int,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_file_file_id ON b_forum_file (file_id);
CREATE INDEX ix_b_forum_file_forum_id ON b_forum_file (forum_id);
CREATE INDEX ix_b_forum_file_topic_id ON b_forum_file (topic_id);
CREATE INDEX ix_b_forum_file_message_id ON b_forum_file (message_id);

CREATE TABLE b_forum_user (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  USER_ID int NOT NULL,
  ALIAS varchar(64),
  DESCRIPTION varchar(255),
  IP_ADDRESS varchar(128),
  AVATAR int,
  NUM_POSTS int DEFAULT '0',
  INTERESTS text,
  LAST_POST int,
  ALLOW_POST char(1) NOT NULL DEFAULT 'Y',
  LAST_VISIT timestamp NOT NULL,
  DATE_REG date NOT NULL,
  REAL_IP_ADDRESS varchar(128),
  SIGNATURE varchar(255),
  SHOW_NAME char(1) NOT NULL DEFAULT 'Y',
  RANK_ID int,
  POINTS int NOT NULL DEFAULT 0,
  HIDE_FROM_ONLINE char(1) NOT NULL DEFAULT 'N',
  SUBSC_GROUP_MESSAGE char(1) NOT NULL DEFAULT 'N',
  SUBSC_GET_MY_MESSAGE char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_user_user_id ON b_forum_user (user_id);

CREATE TABLE b_forum_perms (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_ID int NOT NULL,
  GROUP_ID int NOT NULL,
  PERMISSION char(1) NOT NULL DEFAULT 'M',
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_perms_forum_id_group_id ON b_forum_perms (forum_id, group_id);
CREATE INDEX ix_b_forum_perms_group_id ON b_forum_perms (group_id);

CREATE TABLE b_forum_subscribe (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  USER_ID int NOT NULL,
  FORUM_ID int NOT NULL,
  TOPIC_ID int,
  START_DATE timestamp NOT NULL,
  LAST_SEND int,
  NEW_TOPIC_ONLY char(50) NOT NULL DEFAULT 'N',
  SITE_ID char(2) NOT NULL DEFAULT 'ru',
  SOCNET_GROUP_ID int,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_subscribe_user_id_forum_id_topic_id_socnet_group_id ON b_forum_subscribe (user_id, forum_id, topic_id, socnet_group_id);

CREATE TABLE b_forum_rank (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  CODE varchar(100),
  MIN_NUM_POSTS int NOT NULL DEFAULT 0,
  PRIMARY KEY (ID)
);

CREATE TABLE b_forum_rank_lang (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  RANK_ID int NOT NULL,
  LID char(2) NOT NULL,
  NAME varchar(100) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_rank_lang_rank_id_lid ON b_forum_rank_lang (rank_id, lid);

CREATE TABLE b_forum_group (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  SORT int NOT NULL DEFAULT '150',
  PARENT_ID int,
  LEFT_MARGIN int,
  RIGHT_MARGIN int,
  DEPTH_LEVEL int,
  XML_ID varchar(255),
  PRIMARY KEY (ID)
);

CREATE TABLE b_forum_group_lang (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_GROUP_ID int NOT NULL,
  LID char(2) NOT NULL,
  NAME varchar(255) NOT NULL,
  DESCRIPTION varchar(255),
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_group_lang_forum_group_id_lid ON b_forum_group_lang (forum_group_id, lid);

CREATE TABLE b_forum_points (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  MIN_POINTS int NOT NULL,
  CODE varchar(100),
  VOTES int NOT NULL,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_points_min_points ON b_forum_points (min_points);

CREATE TABLE b_forum_points_lang (
  POINTS_ID int NOT NULL,
  LID char(2) NOT NULL,
  NAME varchar(250),
  PRIMARY KEY (POINTS_ID, LID)
);

CREATE TABLE b_forum_points2post (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  MIN_NUM_POSTS int NOT NULL,
  POINTS_PER_POST decimal NOT NULL DEFAULT 0,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_points2post_min_num_posts ON b_forum_points2post (min_num_posts);

CREATE TABLE b_forum_user_points (
  FROM_USER_ID int NOT NULL,
  TO_USER_ID int NOT NULL,
  POINTS int NOT NULL DEFAULT 0,
  DATE_UPDATE timestamp,
  PRIMARY KEY (FROM_USER_ID, TO_USER_ID)
);
CREATE INDEX ix_b_forum_user_points_to_user_id ON b_forum_user_points (to_user_id);

CREATE TABLE b_forum2site (
  FORUM_ID int NOT NULL,
  SITE_ID char(2) NOT NULL,
  PATH2FORUM_MESSAGE varchar(250),
  PRIMARY KEY (FORUM_ID, SITE_ID)
);

CREATE TABLE b_forum_private_message (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  AUTHOR_ID int DEFAULT '0',
  RECIPIENT_ID int DEFAULT '0',
  POST_DATE timestamp,
  POST_SUBJ varchar(255),
  POST_MESSAGE text NOT NULL,
  USER_ID int NOT NULL,
  FOLDER_ID int NOT NULL,
  IS_READ char(1),
  REQUEST_IS_READ char(1),
  USE_SMILES char(1),
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_private_message_author_id_folder_id_is_read ON b_forum_private_message (author_id, folder_id, is_read);
CREATE INDEX ix_b_forum_private_message_user_id_folder_id_post_date ON b_forum_private_message (user_id, folder_id, post_date);
CREATE INDEX ix_b_forum_private_message_post_date ON b_forum_private_message (post_date);

CREATE TABLE b_forum_pm_folder (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  TITLE varchar(255) NOT NULL,
  USER_ID int NOT NULL,
  SORT int NOT NULL,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_pm_folder_user_id_id_sort_title ON b_forum_pm_folder (user_id, id, sort, title);

CREATE TABLE b_forum_filter (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  DICTIONARY_ID int,
  WORDS varchar(255),
  PATTERN text,
  REPLACEMENT varchar(255),
  DESCRIPTION text,
  USE_IT varchar(50),
  PATTERN_CREATE varchar(5),
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_filter_use_it ON b_forum_filter (use_it);
CREATE INDEX ix_b_forum_filter_pattern_create ON b_forum_filter (pattern_create);

CREATE TABLE b_forum_dictionary (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  TITLE varchar(50),
  TYPE char(1),
  PRIMARY KEY (ID)
);

CREATE TABLE b_forum_letter (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  DICTIONARY_ID int DEFAULT '0',
  LETTER varchar(50),
  REPLACEMENT varchar(255),
  PRIMARY KEY (ID)
);

CREATE TABLE b_forum_user_forum (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  USER_ID int,
  FORUM_ID int,
  LAST_VISIT timestamp,
  MAIN_LAST_VISIT timestamp,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_user_forum_user_id_forum_id ON b_forum_user_forum (user_id, forum_id);

CREATE TABLE b_forum_user_topic (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  TOPIC_ID int,
  USER_ID int,
  FORUM_ID int,
  LAST_VISIT timestamp,
  PRIMARY KEY (TOPIC_ID, USER_ID)
);
CREATE INDEX ix_b_forum_user_topic_id ON b_forum_user_topic (id);
CREATE INDEX ix_b_forum_user_topic_user_id_forum_id_topic_id ON b_forum_user_topic (user_id, forum_id, topic_id);
CREATE INDEX ix_b_forum_user_topic_forum_id_user_id ON b_forum_user_topic (forum_id, user_id);

CREATE TABLE b_forum_stat (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  USER_ID int DEFAULT NULL,
  IP_ADDRESS varchar(128) DEFAULT NULL,
  PHPSESSID varchar(255) DEFAULT NULL,
  LAST_VISIT timestamp DEFAULT NULL,
  SITE_ID char(2) DEFAULT NULL,
  FORUM_ID smallint NOT NULL DEFAULT '0',
  TOPIC_ID int DEFAULT NULL,
  SHOW_NAME varchar(255) DEFAULT NULL,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_stat_site_id_last_visit ON b_forum_stat (site_id, last_visit);
CREATE INDEX ix_b_forum_stat_topic_id_last_visit ON b_forum_stat (topic_id, last_visit);
CREATE INDEX ix_b_forum_stat_forum_id_last_visit ON b_forum_stat (forum_id, last_visit);
CREATE INDEX ix_b_forum_stat_phpsessid ON b_forum_stat (phpsessid);

CREATE TABLE b_forum_email (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  EMAIL_FORUM_ACTIVE char(1) NOT NULL DEFAULT 'Y',
  FORUM_ID int NOT NULL,
  SOCNET_GROUP_ID int,
  MAIL_FILTER_ID int NOT NULL,
  EMAIL varchar(255) NOT NULL,
  USE_EMAIL char(1),
  EMAIL_GROUP varchar(255),
  SUBJECT_SUF varchar(50),
  USE_SUBJECT char(1),
  URL_TEMPLATES_MESSAGE varchar(255),
  NOT_MEMBER_POST char(1),
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_forum_email_forum_id_socnet_group_id ON b_forum_email (forum_id, socnet_group_id);
CREATE INDEX ix_b_forum_email_mail_filter_id ON b_forum_email (mail_filter_id);

CREATE TABLE b_forum_service_deleted_message (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  FORUM_ID int NOT NULL,
  TOPIC_ID int8 NOT NULL,
  MESSAGE_ID int8 NOT NULL,
  NEW_TOPIC char(1) NOT NULL DEFAULT 'N',
  APPROVED char(1) NOT NULL DEFAULT 'Y',
  PARAM1 varchar(2),
  PARAM2 int,
  AUTHOR_ID int,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_service_deleted_message_message_id ON b_forum_service_deleted_message (message_id);

CREATE TABLE b_forum_service_statistic_queue (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  ENTITY_TYPE varchar(20),
  ENTITY_ID int NOT NULL,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_forum_service_statistic_queue_entity_type_entity_id ON b_forum_service_statistic_queue (entity_type, entity_id);
