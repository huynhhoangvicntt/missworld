<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_MODULES')) {
    exit('Stop!!!');
}

$sql_drop_module = [];

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_player;";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voter;";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_player (
id int(11) unsigned NOT NULL AUTO_INCREMENT,
name varchar(190) NOT NULL COMMENT 'Họ và tên thí sinh',
alias varchar(190) NOT NULL COMMENT 'Liên kết tĩnh không trùng',
dob_address varchar(190) NOT NULL COMMENT 'Ngày sinh, nơi sinh',
height int(11) NOT NULL DEFAULT '0' COMMENT 'Chiều cao',
measurements varchar(190) NOT NULL COMMENT 'Số đo ba vòng',
email varchar(190) NOT NULL COMMENT 'Địa chỉ email',
image varchar(255) NOT NULL COMMENT 'Ảnh hồ sơ',
weight smallint(4) unsigned NOT NULL DEFAULT '0',
add_time int(11) NOT NULL DEFAULT '0',
edit_time int(11) NOT NULL DEFAULT '0',
vote_count int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt vote',
PRIMARY KEY (id),
UNIQUE KEY alias (alias)
) ENGINE=InnoDB";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voter (
id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
userid int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Id người dùng có tài khoản',
name varchar(190) NOT NULL COMMENT 'Họ tên người vote',
email varchar(190) NOT NULL COMMENT 'Email người vote',
vote_time int(11) unsigned NOT NULL DEFAULT '0',
PRIMARY KEY (id),
UNIQUE KEY email (email),
KEY userid (userid)
) ENGINE=InnoDB";

$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'per_page', '12')";