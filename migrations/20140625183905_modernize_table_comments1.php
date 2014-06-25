<?php

use Phinx\Migration\AbstractMigration;

/************************************
 * Class ModernizeTableComments1
 *
 * Updates many of the tablecomments
 * Trimming unnecessary texts, fixing typo's, improve wording
 * Adding mentions of deprecated tables
 *
 * See ticket: #2208
 *
 */
class ModernizeTableComments1 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $comments = array(
            'activities' => 'Descriptions and metadata for activites feature',
            'activitiesattendees' => 'Participants in an activity',
            'blog' => 'Blog references and technical data',
            'blog_categories' => 'Categorylabels for blogs created by members',
            'blog_categories_seq' => 'Technical table created by innodb',
            'blog_comments' => 'Comments of members to blog articles',
            'blog_comments_seq' => 'Technical table created by innodb',
            'blog_data' => 'Blog articles and metadata',
            'blog_seq' => 'Technical table created by innodb',
            'blog_tags' => 'Taglabels for blogs created by members',
            'blog_tags_seq' => 'Technical table created by innodb',
            'blog_to_category' => 'Binding blogitems to categories',
            'blog_to_tag' => 'Binding blogitems to tags',
            'broadcast' => 'For massmail used by adminmassmails',
            'broadcastmessages' => 'Members to send broadcasts to',
            'countries' => 'DEPRECATED, use geonamescountries',
            'counters_regions_nbcities' => 'DEPRECATED, still used by view regions',
            'cryptedfields' => 'Sensitive data',
            'donations' => 'History of bw donations',
            'ewiki' => 'Wiki articles and metadata',
            'faq' => 'Faq table, all composed with translatable questions',
            'faqcategories' => 'List of categories for faq',
            'feedbackcategories' => 'Available categories for members feedbacks',
            'flags' => 'Possible flags for members',
            'flagsmembers' => 'Flags for different members',
            'forums_posts' => 'Posts of groups and forums',
            'forums_posts_votes' => 'DEPRECATED, feature no longer in use',
            'forums_tags' => 'Tags of groups and forums',
            'forums_threads' => 'Threads of groups and forums',
            'gallery' => 'Albums with member uploaded pictures',
            'gallery_comments' => 'Comments to pictures',
            'gallery_comments_seq' => 'Technical table created by innodb',
            'gallery_items' => 'Individual pictures uploaded by members',
            'gallery_items_seq' => 'Technical table created by innodb',
            'gallery_items_to_gallery' => 'Binding pictures to an album',
            'gallery_seq' => 'Technical table created by innodb',
            'geo_hierarchy' => 'DEPRECATED, use geonames',
            'geo_type' => 'DEPRECATED',
            'geo_usage' => 'DEPRECATED',
            'geonames' => 'Basic topographic data from geonames.org',
            'geonames_admincodes' => 'DEPRECATED, use geonamesadmincodes',
            'geonames_alternate_names' => 'DEPRECATED, use geonamesalternatenames',
            'geonames_cache' => 'DEPRECATED, use geonames',
            'geonames_cache_backup' => 'DEPRECATED, use geonames',
            'geonames_countries' => 'DEPRECATED, use geonamescountries',
            'geonames_timezones' => 'DEPRECATED, use timezones',
            'geonamesadminunits' => 'Extract from geonames table for performance',
            'geonamesalternatenames' => 'Translated topographic names from geonames.org',
            'geonamescountries' => 'Country data from geonames.org',
            'groups' => 'Metadata for discussion groups',
            'groups_related' => 'Relations between groups',
            'groupsmessages' => 'Messages sent to groups',
            'guestsonline' => 'DEPRECATED, feature to be deleted',
            'hcvol_config' => 'Reference for configuring hcvol',
            'intermembertranslations' => 'DEPRECATED',
            'languages' => 'List of available languages',
            'linklist' => 'DEPRECATED (no longer updated)',
            'members_groups_subscribed' => 'Subscriptions of members to groups',
            'members_sessions' => 'Tokens of sessions',
            'members_tags_subscribed' => 'Subscriptions of members to tags',
            'members_threads_subscribed' => 'Subscriptions of members to threads',
            'membersphotos' => 'Avatars for members',
            'memberspreferences' => 'Preferences for each members',
            'memberspublicprofiles' => 'Members who have a public profile',
            'messages' => 'All the messages sent to members',
            'mod_user_apps' => 'DEPRECATED',
            'mod_user_apps_seq' => 'DEPRECATED',
            'mod_user_auth' => 'DEPRECATED',
            'mod_user_auth_seq' => 'DEPRECATED',
            'mod_user_authgroups' => 'DEPRECATED',
            'mod_user_authrights' => 'DEPRECATED',
            'mod_user_groupauth' => 'DEPRECATED',
            'mod_user_grouprights' => 'DEPRECATED',
            'mod_user_implications' => 'DEPRECATED',
            'mod_user_rights' => 'DEPRECATED',
            'mod_user_rights_seq' => 'DEPRECATED',
            'notes' => 'Flash messages for member startpage',
            'online' => 'DEPRECATED, feature to be deleted',
            'params' => 'Generic paramaters',
            'pendingmandatory' => 'DEPRECATED, feature no longer in use',
            'phinxlog' => 'Database versions',
            'polls_choices' => 'For a certain poll possible choices',
            'polls_choices_hierachy' => 'Count results for poll choices',
            'polls_contributions' => 'Contributions to the poll',
            'polls_list_allowed_countries' => 'Restrictions for polls based on countries  ',
            'polls_list_allowed_groups' => 'Restrictions for polls based on groups ',
            'polls_list_allowed_locations' => 'Restrictions for polls based on location ',
            'polls_record_of_choices' => 'Choices made on non-anonymous polls',
            'posts_notificationqueue' => 'Tell mailbot who to notify about',
            'preferences' => 'Metadata and wordcodes for memberpreferences',
            'previousversion' => 'History of translations',
            'privileges' => 'Privileges part of the rights system',
            'recentvisits' => 'DEPRECATED, use profilesvisits',
            'recorded_usernames_of_left_members' => 'DEPRECATED',
            'reports_to_moderators' => 'Report comments from members to moderator',
            'rights' => 'Possible rights for members',
            'rightsvolunteers' => 'Rights for different members',
            'roles' => 'Roles part of the rights system',
            'shouts' => 'Comments on groups',
            'shouts_seq' => 'Technical table created by innodb',
            'specialrelations' => 'Special relation between members if the ',
            'sqlforgroupsmembers' => 'DEPRECATED, feature no longer in use',
            'sqlforvolunteers' => 'Queries made for volunteers in AdminQuery',
            'stats' => 'Daily statistics page',
            'suggestions' => 'Posed problems in the suggestion process',
            'suggestions_option_ranks' => 'Up and downvoting on accepted solutions',
            'suggestions_options' => 'Suggested solutions for problems',
            'suggestions_votes' => 'Acceptance votes for solutions',
            'tags' => 'Tag definitions used by forum, groups, etc.',
            'tantable' => 'DEPRECATED',
            'timezone' => 'Correspondance for timezones in geonames',
            'translations' => 'General translated data by members',
            'trip' => 'Trip references and technical data',
            'trip_data' => 'Trip articles and metadata',
            'trip_seq' => 'Technical table created by innodb',
            'trip_to_gallery' => 'Binding a trip to an album',
            'urlheader_languages' => 'DEPRECATED',
            'user' => 'DEPRECATED, use members',
            'user_friends' => 'DEPRECATED',
            'user_inbox' => 'DEPRECATED, use messages',
            'user_outbox' => 'DEPRECATED, use messages',
            'user_seq' => 'DEPRECATED, together with user',
            'user_settings' => 'DEPRECATED, use memberpreferences',
            'verifiedmembers' => 'DEPRECATED, feature no longer in use',
            'volunteer_boards' => 'DEPRECATED, feature no longer in use',
        );
        
        foreach ($comments as $table => $com){
            $this->execute("
ALTER TABLE `$table`
COMMENT '$com'
                ");
        }
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $comments = array(
            'activities' => '',
            'activitiesattendees' => '',
            'blog' => '',
            'blog_categories' => '',
            'blog_categories_seq' => '',
            'blog_comments' => '',
            'blog_comments_seq' => '',
            'blog_data' => '',
            'blog_seq' => '',
            'blog_tags' => '',
            'blog_tags_seq' => '',
            'blog_to_category' => '',
            'blog_to_tag' => '',
            'broadcast' => 'This table is for massmail used by adminmassmails',
            'broadcastmessages' => 'This is the table with the list of members to broad cast',
            'countries' => '',
            'counters_regions_nbcities' => '',
            'cryptedfields' => 'This table contains sensitive data',
            'donations' => 'This is the table where the history of BW donation is kept',
            'ewiki' => '',
            'faq' => 'This is the Faq table, all composed with translatable questi',
            'faqcategories' => 'This is the list of categories for Faq',
            'feedbackcategories' => 'The different available categories for members feedbacks',
            'flags' => 'List of possible Fags for members',
            'flagsmembers' => 'The different flags for different members',
            'forums_posts' => '',
            'forums_posts_votes' => '',
            'forums_tags' => '',
            'forums_threads' => '',
            'gallery' => '',
            'gallery_comments' => '',
            'gallery_comments_seq' => '',
            'gallery_items' => '',
            'gallery_items_seq' => '',
            'gallery_items_to_gallery' => '',
            'gallery_seq' => '',
            'geo_hierarchy' => '',
            'geo_type' => '',
            'geo_usage' => '',
            'geonames' => '',
            'geonames_admincodes' => '',
            'geonames_alternate_names' => '',
            'geonames_cache' => '',
            'geonames_cache_backup' => '',
            'geonames_countries' => '',
            'geonames_timezones' => '',
            'geonamesadminunits' => '',
            'geonamesalternatenames' => '',
            'geonamescountries' => '',
            'groups' => 'Available group for subscription.',
            'groups_related' => '',
            'groupsmessages' => 'Here are stored the messages sent to Groups',
            'guestsonline' => '',
            'hcvol_config' => 'This table is the reference for configuring HCVol',
            'intermembertranslations' => '',
            'languages' => 'This table is the list of available language',
            'linklist' => '',
            'members_groups_subscribed' => 'This is the table where are stored the members who are subsc',
            'members_sessions' => '',
            'members_tags_subscribed' => 'This is the table used to store which members has subscribed',
            'members_threads_subscribed' => 'This is the table used to store which members has subscribed',
            'membersphotos' => 'Photos for members',
            'memberspreferences' => 'The preferences for each members',
            'memberspublicprofiles' => 'List all the members who have a public profile',
            'messages' => 'Here are stored all the messages sent to members. An archive',
            'mod_user_apps' => '',
            'mod_user_apps_seq' => '',
            'mod_user_auth' => '',
            'mod_user_auth_seq' => '',
            'mod_user_authgroups' => '',
            'mod_user_authrights' => '',
            'mod_user_groupauth' => '',
            'mod_user_grouprights' => '',
            'mod_user_implications' => '',
            'mod_user_rights' => '',
            'mod_user_rights_seq' => '',
            'notes' => '',
            'online' => '',
            'params' => 'This is the table with generic paramaters',
            'pendingmandatory' => '',
            'phinxlog' => '',
            'polls_choices' => 'This is the table for a certain poll possible choices',
            'polls_choices_hierachy' => 'This table is used to store counters results for poll choice',
            'polls_contributions' => 'Here are stored the contribution to the poll',
            'polls_list_allowed_countries' => 'This table allows to define a restrictive list of countries ',
            'polls_list_allowed_groups' => 'This table allows to define a restrictive list of groups all',
            'polls_list_allowed_locations' => 'This table allows to define a restrictive list of location a',
            'polls_record_of_choices' => 'if the poll is not anonym, this table will be use to store t',
            'posts_notificationqueue' => 'This table is to be used to tell mailbot who to notify about',
            'preferences' => 'Contain the list of the available preferences with the corre',
            'previousversion' => '',
            'privileges' => 'The privileges part of the rights system',
            'recentvisits' => '',
            'recorded_usernames_of_left_members' => '',
            'reports_to_moderators' => 'This table is used to report comments from members to modera',
            'rights' => 'List of possible Rights',
            'rightsvolunteers' => 'The different rights for different members',
            'roles' => 'The roles part of the rights system',
            'shouts' => '',
            'shouts_seq' => '',
            'specialrelations' => 'This table describe special relation between members if the ',
            'sqlforgroupsmembers' => '',
            'sqlforvolunteers' => 'this is a table for queries made for helping volunteers',
            'stats' => 'This is the daily statistics page',
            'suggestions' => '',
            'suggestions_option_ranks' => '',
            'suggestions_options' => '',
            'suggestions_votes' => '',
            'tags' => 'This table is the table of tag, it will be use by forum, gro',
            'tantable' => '',
            'timezone' => 'This is the correspondance for TimeZones in geonames',
            'translations' => 'Will be used to store general translated data by members',
            'trip' => '',
            'trip_data' => '',
            'trip_seq' => '',
            'trip_to_gallery' => '',
            'urlheader_languages' => '',
            'user' => 'This table is a legacy, do not use it, use members instead',
            'user_friends' => '',
            'user_inbox' => '',
            'user_outbox' => '',
            'user_seq' => 'tb legacy, obsolete',
            'user_settings' => '',
            'verifiedmembers' => '',
            'volunteer_boards' => ''
        );

        foreach ($comments as $table => $com){
            $this->execute("
ALTER TABLE `$table`
COMMENT '$com'
                ");
        }
    }
}