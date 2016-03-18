<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

abstract class Enum {
    /*   ______________________________________
     *  /
     * |
     * | User roles
     * |
     *  \______________________________________
     */

    const ADMINISTRATOR = 1;
    const SUPER_ADMINISTRATOR = 2;
    const MODERATOR = 3;
    const EDITOR = 4;
    const EDITOR_ENGLISH = 5;
    const EDITOR_ESTONIAN = 6;
    const EDITOR_RUSSIAN = 7;
    const EDITOR_LITHUANIA = 8;
    const EDITOR_LATVIA = 9;


    /*   ______________________________________
     *  /
     * |
     * | Language
     * |
     *  \______________________________________
     */
    const ENGLISH = 1;
    const ESTONIAN = 2;
    const LITHUANIA = 3;
    const LATVIA = 4;
    const RUSSIA = 5;
    const ENGLISH_PREFIX = "en";
    const ESTONIAN_PREFIX = "ee";
    const LITHUANIA_PREFIX = "lt";
    const LATVIA_PREFIX = "lv";
    const RUSSIAN_PREFIX = "ru";

    /**
     * Get prefix end role id
     * 
     * @param type $language
     * @param type $swapIdName  // Set 'true' to get role id by PREFIX, set 'false' to get PREFIX by Role id
     */
    public static function getEditorLanguage($languageOrRole, $prefix = false) {
        if ($prefix == true) {
            switch ($languageOrRole) {
                case self::ENGLISH_PREFIX:
                    return self::ENGLISH;
                    break;
                case self::ESTONIAN_PREFIX:
                    return self::ESTONIAN;
                    break;
                case self::LITHUANIA_PREFIX:
                    return self::LITHUANIA;
                    break;
                case self::LATVIA_PREFIX:
                    return self::LATVIA;
                    break;
                case self::RUSSIAN_PREFIX:
                    return self::RUSSIA;
                    break;
                default:return self::ENGLISH;
            }
        } else {
            switch ($languageOrRole) {
                case self::EDITOR_ENGLISH:
                    return self::ENGLISH_PREFIX;
                    break;
                case self::EDITOR_ESTONIAN:
                    return self::ESTONIAN_PREFIX;
                    break;
                case self::EDITOR_LITHUANIA:
                    return self::LITHUANIA_PREFIX;
                    break;
                case self::EDITOR_LATVIA:
                    return self::LATVIA_PREFIX;
                    break;
                case self::EDITOR_RUSSIAN:
                    return self::RUSSIAN_PREFIX;
                    break;
                default:return self::ENGLISH_PREFIX;
            }
        }
    }

    const NO_DELETED = 1;
    const DELETED = 2;
    const ON = 1;
    const OFF = 0;
    const EDUCATIONKS_STORAGE = "educationks/img/";
    const NO_FEATURE_IMAGE = 0;

    /*   _______________________________________
     *  /
     * |
     * |  Image thumbnail settings
     * |
     *  \_______________________________________
     */
    const IMAGE_THUMBNAIL = "thumbnail",
            IMAGE_MEDIUM = "medium",
            IMAGE_LARGE = "large",
            IMAGE_ORIGINAL = "original";

    public static function create_slug($string) {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $slug = strtolower(trim($slug,'-'));
        return $slug;
    }

    public static function getSizeImage($THUMBNAIL_TYPE) {
        switch ($THUMBNAIL_TYPE) {
            case self::IMAGE_THUMBNAIL: return array("width" => 150, "height" => 150);   //150px x 150px || width x height
            case self::IMAGE_MEDIUM: return array("width" => 300, "height" => 300);   //300px x 300px || width x height
            case self::IMAGE_LARGE: return array("width" => 640, "height" => 640);   //640px x 640px || width x height
            default:;   //Original
        }
    }

    public function getRoleGroup() {
        $userRole = UserRole::getAll();

        return $userRole->toArray();
    }

    const VERSION_EDUCATIONKS_DEV = "v0.4 Dev", //Dev Version
            VERSION_EDUCATIONKS = "v0.3";   //Production Version
    
    /**
     * Sorting
     */
    const ASC = 1;
    const DESC = 2;
    

    /**
     * Advertising view front
     */
    const ads_top_nav_1 = 1;    //
    const ads_content_2 = 2;    //728x90
    const ads_right_3 = 3;      //160x600
    const ads_right_4 = 4;      //300x250
    const ads_sidebar_5 = 5;    //300x250
    const ads_sidebar_6 = 6;    //300x250
    const ads_footer_7 = 7;     //
    const ADS_TOP_NAV = 1;    //
    const ADS_CONTENT_2 = 2;    //728x90
    const ADS_RIGHT_3 = 3;      //160x600
    const ADS_RIGHT_4 = 4;      //300x250
    const ADS_SIDEBAR_5 = 5;    //300x250
    const ADS_SIDEBAR_6 = 6;    //300x250
    const ADS_FOOTER_7 = 7;     //
    const AUTONET_URL = "http://pics.autonet.ee/";

    public static function isAdmin($userRoleId) {
        if ($userRoleId == self::ADMINISTRATOR) {
            return true;
        }
        return false;
    }

    public static function isSuperAdmin($userRoleId) {
        if ($userRoleId == self::SUPER_ADMINISTRATOR) {
            return true;
        }
        return false;
    }

    public static function isEditor($userRoleId) {
        if ($userRoleId >= self::EDITOR && self::EDITOR_LATVIA >= $userRoleId) {
            return true;
        }
        return false;
    }

}
