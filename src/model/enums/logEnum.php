<?php
    namespace App\Log;

    enum LogActType: string {
        case LOG_LOGIN_USER = 'LOGIN_USER';
        case LOG_CREATE_USER = 'SIGNUP_USER';
        case LOG_DELETE_USER = 'DELETE_USER';
        case LOG_UPDATE_USER = 'UPDATE_USET';
        case LOG_LOGOUT_USER = 'LOGOUT_USER';
    }

    enum LogSaveType {
        case LOG_FILE;
        case LOG_DB;
    }
    