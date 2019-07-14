# Improv Analysis 2.0

## Contents

* a Wordpress plugin to store improv analyses in a database
* mostly written in PHP/MySQL, but uses $wpdb object & hides behind the Wordpress login

## How to install

* copy plugin files to Wordpress install
  * e.g. `cp -r /plugin $WORDPRESS_PATH/wp-content/plugins/improv-analysis-2.0`
* enable plugin
* manually create databases with the following SQL:

```sql
# Dump of table improv_analysis_analyses
# ------------------------------------------------------------

CREATE TABLE `improv_analysis_analyses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(127) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `performer` varchar(127) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `duration` float NOT NULL DEFAULT '0',
  `url_id` varchar(127) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `instruments` varchar(127) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `performer_count` int(11) NOT NULL DEFAULT '1',
  `comment` varchar(127) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;



# Dump of table improv_analysis_events
# ------------------------------------------------------------

CREATE TABLE `improv_analysis_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `analysis_id` int(11) NOT NULL,
  `time` varchar(127) COLLATE latin1_general_ci NOT NULL,
  `stream` tinyint(4) NOT NULL DEFAULT '0',
  `comment` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
```
