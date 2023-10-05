<?php
//
//$ERROR_CODES = array(
//    "PERSONS" => array(
//        "GET" => array(
//            'MISSING_REQUEST_PARAMS' => [
//                'ID' => [
//                    "NAME" => "Missing ID",
//                    "CODE" => "PGMRPID.1001",
//                    "CAUSE" => "Found out that param is missing from the request.",
//                    "FIX" => "Make sure that the param exists in the request data."
//                ],
//            ],
//            'RESULTS' => [
//                "NOT_FOUND" => array(
//                    "NAME" => "No results found",
//                    "CODE" => "PGRNF.1001",
//                    "CAUSE" => "No data found in database.",
//                    "FIX" => "Check if data exists in the database."
//                ),
//            ],
//        ),
//    ),
//    "DECRYPTION" => array(
//        "USER_SECRETS" => array(
//            "NOT_FOUND" => array(
//                "NAME" => "No decryption keys",
//                "CODE" => "DUN.1001",
//                "CAUSE" => "User secrets were not found in the database.",
//                "FIX" => "Check if the user exists in the database and their secrets have been stored properly."
//            ),
//        ),
//    ),
//    "CATEGORIES" => array(
//        "DELETE" => array(
//            "QUERY_FAILED" => array(
//                "NAME" => "Error deleting category",
//                "CODE" => "CDQ.1001",
//                "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "VALIDATION" => array(
//                "DOESNT_BELONG_TO_USER" => array(
//                    "NAME" => "You dont own this category",
//                    "CODE" => "CDVD.1001",
//                    "CAUSE" => "Found out that category id does not belong to user id",
//                    "FIX" => "Make sure that the category id you are trying to check belongs to the user id when trying to delete it"
//                ),
//                "NOT_FOUND" => array(
//                    "NAME" => "Category was not found",
//                    "CODE" => "CDVN.1002",
//                    "CAUSE" => "Found out that category id does not exist",
//                    "FIX" => "Make sure that the category id you are trying to check exists in database when trying to delete it"
//                ),
//                "IDENTIFIER_NOT_FOUND" => array(
//                    "NAME" => "Category identifier was not found",
//                    "CODE" => "CDVI.1003",
//                    "CAUSE" => "Found out that category id identifier does not exist",
//                    "FIX" => "Make sure that the category id is sent to the server when you are trying to delete it"
//                ),
//            ),
//        ),
//    ),
//    "PASSWORDS" => array(
//        "UPDATE" => array(
//            "QUERY_FAILED" => array(
//                "NAME" => "Error saving password",
//                "CODE" => "PUQ.1001",
//                "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "QUERY_FAILED_TRY_CATCH" => array(
//                "NAME" => "Error saving password",
//                "CODE" => "PUQ.1002",
//                "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "VALIDATION" => array(
//                "FIELDS" => array(
//                    "ONE_OR_MORE_ARE_INVALID" => array(
//                        "NAME" => "One or more fields are invalid",
//                        "CODE" => "PUVFO.1001",
//                        "CAUSE" => "One or more required fields are empty or not set",
//                        "FIX" => "Make sure to check the required fields and check if they are set properly"
//                    ),
//                    "CATEGORY" => array(
//                        "DOESNT_BELONG_TO_USER" => array(
//                            "NAME" => "You dont own this category",
//                            "CODE" => "PUVFC.1001",
//                            "CAUSE" => "Found out that category id does not belong to user id",
//                            "FIX" => "Make sure that the category id you are trying to check belongs to the user id."
//                        ),
//                        "NOT_FOUND_IN_REQUEST" => array(
//                            "NAME" => "Category was not found in request",
//                            "CODE" => "PUVFC.1002",
//                            "CAUSE" => "The Category id was not found in the request data.",
//                            "FIX" => "Make sure that the Category id you are trying to update exists in the request data."
//                        ),
//                        "NOT_FOUND" => array(
//                            "NAME" => "Category was not found",
//                            "CODE" => "PUVFC.1003",
//                            "CAUSE" => "Found out that category id does not exist in database.",
//                            "FIX" => "Make sure that the category id you are trying to check exists in database."
//                        ),
//                    ),
//                ),
//                "IDENTIFIERS" => array(
//                    "PASSWORD_IDENTIFIER" => array(
//                        "IDENTIFIER_NOT_FOUND_IN_REQUEST" => array(
//                            "NAME" => "Password identifier was not found in request",
//                            "CODE" => "PUVIPI.1001",
//                            "CAUSE" => "The password id was not found in the request data.",
//                            "FIX" => "Make sure that the password id you are trying to update exists in the request data."
//                        ),
//                        "IDENTIFIER_NOT_FOUND" => array(
//                            "NAME" => "Password identifier was not found",
//                            "CODE" => "PUVIPI.1002",
//                            "CAUSE" => "Found out that password identifier does not exist in database.",
//                            "FIX" => "Make sure that the password identifier you are trying to check exists in database."
//                        ),
//                        "IDENTIFIER_DOESNT_BELONG_TO_USER" => array(
//                            "NAME" => "You dont own this password identifier",
//                            "CODE" => "PUVIPI.1003",
//                            "CAUSE" => "Found out that password identifier does not belong to user id",
//                            "FIX" => "Make sure that the password identifier you are trying to check belongs to the user id."
//                        ),
//                    ),
////                    "CATEGORY_IDENTIFIER" => array(
////                        "IDENTIFIER_NOT_FOUND" => array(
////                            "NAME" => "Category identifier was not found",
////                            "CODE" => "PUVICI.1001",
////                            "CAUSE" => "The category id was not found in the request data.",
////                            "FIX" => "Make sure that the category id you are trying to update exists in the request data."
////                        ),
////                    ),
//                ),
//            ),
//        ),
//        "INSERT" => array(
//            "QUERY_FAILED" => array(
//                "NAME" => "Error saving password",
//                "CODE" => "PIQ.1001",
//                "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "VALIDATION" => array(
//                "FIELDS" => array(
//                    "ONE_OR_MORE_ARE_INVALID" => array(
//                        "NAME" => "One or more fields are invalid",
//                        "CODE" => "PIVFO.1001",
//                        "CAUSE" => "One or more required fields are empty or not set",
//                        "FIX" => "Make sure to check the required fields and check if they are set properly"
//                    ),
//                ),
//                "CATEGORY" => array(
//                    "DOESNT_BELONG_TO_USER" => array(
//                        "NAME" => "You dont own this category",
//                        "CODE" => "PIVCD.1001",
//                        "CAUSE" => "Found out that category id does not belong to user id",
//                        "FIX" => "Make sure that the category id you are trying to check belongs to the user id when trying to create a new password"
//                    ),
//                    "NOT_FOUND" => array(
//                        "NAME" => "Category was not found",
//                        "CODE" => "PIVCN.1002",
//                        "CAUSE" => "Found out that category id does not exist",
//                        "FIX" => "Make sure that the category id you are trying to check exists in database when trying to create a new password"
//                    ),
//                ),
//            ),
//        ),
//        "DELETE" => array(
//            "VALIDATION" => array(
//                "DOESNT_BELONG_TO_USER" => array(
//                    "NAME" => "You dont own this password",
//                    "CODE" => "PDVD.1001",
//                    "CAUSE" => "Found out that password id does not belong to user id.",
//                    "FIX" => "Make sure that the password id you are trying to check belongs to the user id."
//                ),
//                "NOT_FOUND" => array(
//                    "NAME" => "Password was not found",
//                    "CODE" => "CDVN.1002",
//                    "CAUSE" => "Found out that password id does not exist in database.",
//                    "FIX" => "Make sure that the password id you are trying to check exists in database."
//                ),
//                "IDENTIFIER_NOT_FOUND" => array(
//                    "NAME" => "Password identifier was not found",
//                    "CODE" => "CDVI.1003",
//                    "CAUSE" => "Found out that category id identifier does not exist",
//                    "FIX" => "Make sure that the category id is sent to the server when you are trying to delete it"
//                ),
//            ),
//            "QUERY" => array(
//                "NO_AFFECTED_ROWS" => array(
//                    "NAME" => "Error deleting password",
//                    "CODE" => "PDQN.1001",
//                    "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//                "QUERY_FAILED" => array(
//                    "NAME" => "Error deleting password",
//                    "CODE" => "PDQQ.1002",
//                    "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//                "ERROR_PERFORMING_QUERY" => array(
//                    "NAME" => "Error performing query",
//                    "CODE" => "PDQE.1003",
//                    "CAUSE" => "The insert query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//            ),
//        ),
//        "GET" => array(
//            "NOT_FOUND" => array(
//                "NAME" => "Passwords not found",
//                "CODE" => "PGN.1001",
//                "CAUSE" => "No passwords have been found.",
//                "FIX" => "Check the function that gets user passwords."
//            ),
//        ),
//    ),
//    "PINCODE" => array(
//        "VALIDATION" => array(
//            "IDENTIFIERS" => array(
//                "PINCODE_IDENTIFIER" => array(
//                    "IDENTIFIER_NOT_FOUND_IN_REQUEST" => array(
//                        "NAME" => "Pin Code identifier was not found in request",
//                        "CODE" => "PVIPI.1001",
//                        "CAUSE" => "The Pin Code was not found in the request data.",
//                        "FIX" => "Make sure that the Pin Code exists in the request data."
//                    ),
//                    "IDENTIFIER_INCORRECT" => array(
//                        "NAME" => "Incorrect Pin Code",
//                        "CODE" => "PVIPI.1002",
//                        "CAUSE" => "Found out that user's Pin Code is incorrect.",
//                        "FIX" => "Make sure that the pin code sent in request matches user's pin code."
//                    ),
//                    "IDENTIFIER_MUST_CONTAIN_NUMBERS_ONLY" => array(
//                        "NAME" => "Pin Code must contain numbers only",
//                        "CODE" => "PVIPI.1003",
//                        "CAUSE" => "Found out that Pin Code contains characters that are not numbers",
//                        "FIX" => "Make sure that the password identifier contains numbers only."
//                    ),
//                    "IDENTIFIER_OWNER_NOT_FOUND" => array(
//                        "NAME" => "Pin Code user was not found",
//                        "CODE" => "PVIPI.1004",
//                        "CAUSE" => "Found out that Pin Code's owner was not found in database",
//                        "FIX" => "Make sure that the password identifier's owner data exists in database (tried to get user data from database to validate pin code, and user data were not found)."
//                    ),
//                ),
//            ),
//        ),
//    ),
//    "TWOFACTOR" => array(
//        "VALIDATION" => array(
//            "IDENTIFIERS" => array(
//                "TWOFACTOR_IDENTIFIER" => array(
//                    "IDENTIFIER_NOT_FOUND_IN_REQUEST" => array(
//                        "NAME" => "Two Factor code was not found in request",
//                        "CODE" => "TVITI.1001",
//                        "CAUSE" => "The Two Factor code was not found in the request data.",
//                        "FIX" => "Make sure that the Two Factor code exists in the request data."
//                    ),
//                    "IDENTIFIER_INCORRECT" => array(
//                        "NAME" => "Incorrect Two Factor code",
//                        "CODE" => "TVITI.1002",
//                        "CAUSE" => "Found out that user's Two Factor code is incorrect.",
//                        "FIX" => "Make sure that the Two Factor code sent in request matches user's pin code."
//                    ),
//                    "IDENTIFIER_MUST_CONTAIN_NUMBERS_ONLY" => array(
//                        "NAME" => "Incorrect Two Factor code",
//                        "CODE" => "TVITI.1003",
//                        "CAUSE" => "Found out that Two Factor code contains characters that are not numbers",
//                        "FIX" => "Make sure that the Two Factor code identifier contains numbers only."
//                    ),
//                    "IDENTIFIER_OWNER_NOT_FOUND" => array(
//                        "NAME" => "Two Factor user was not found",
//                        "CODE" => "TVITI.1004",
//                        "CAUSE" => "Found out that Two Factor's owner was not found in database",
//                        "FIX" => "Make sure that the Two Factor's owner data exists in database (tried to get user data from database to validate pin code, and user data were not found)."
//                    ),
//                ),
//            ),
//        ),
//    ),
//    "REQUESTS" => array(
//        "REJECTED" => array(
//            "IN_LOCK_MODE" => array(
//                "NAME" => "Request Rejected In Lock Mode",
//                "CODE" => "RRI.1001",
//                "CAUSE" => "Request rejected because user is in lock mode.",
//                "FIX" => "Make sure that user is not in lock mode before sending request."
//            ),
//        ),
//    ),
//    "SUCCESSFUL_LOGINS" => array(
//        "DELETE" => array(
//            "QUERY_FAILED" => array(
//                "NAME" => "Error deleting history",
//                "CODE" => "SDQ.1001",
//                "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "VALIDATION" => array(
//                "DOESNT_BELONG_TO_USER" => array(
//                    "NAME" => "You dont own this history",
//                    "CODE" => "SDVI.1001",
//                    "CAUSE" => "Found out that history id does not belong to user id",
//                    "FIX" => "Make sure that the history id you are trying to check belongs to the user id when trying to delete it"
//                ),
//                "NOT_FOUND" => array(
//                    "NAME" => "History was not found",
//                    "CODE" => "SDVI.1002",
//                    "CAUSE" => "Found out that history id does not exist",
//                    "FIX" => "Make sure that the history id you are trying to check exists in database when trying to delete it"
//                ),
//                "IDENTIFIER_NOT_FOUND" => array(
//                    "NAME" => "History identifier was not found",
//                    "CODE" => "SDVI.1003",
//                    "CAUSE" => "Found out that history id identifier does not exist",
//                    "FIX" => "Make sure that the history id is sent to the server when you are checking it"
//                ),
//                "USER_DOES_NOT_HAVE_HISTORY" => array(
//                    "NAME" => "You dont have any history",
//                    "CODE" => "SDVI.1004",
//                    "CAUSE" => "Found out that user does not have any history.",
//                    "FIX" => "Make sure that the there are history belongs to the user id in the database."
//                ),
//            ),
//        ),
//    ),
//    "FAILED_LOGINS" => array(
//        "DELETE" => array(
//            "QUERY_FAILED" => array(
//                "NAME" => "Error deleting history",
//                "CODE" => "FDQ.1001",
//                "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "VALIDATION" => array(
//                "DOESNT_BELONG_TO_USER" => array(
//                    "NAME" => "You dont own this history",
//                    "CODE" => "FDVI.1001",
//                    "CAUSE" => "Found out that history id does not belong to user id",
//                    "FIX" => "Make sure that the history id you are trying to check belongs to the user id when trying to delete it"
//                ),
//                "NOT_FOUND" => array(
//                    "NAME" => "History was not found",
//                    "CODE" => "FDVI.1002",
//                    "CAUSE" => "Found out that history id does not exist",
//                    "FIX" => "Make sure that the history id you are trying to check exists in database when trying to delete it"
//                ),
//                "IDENTIFIER_NOT_FOUND" => array(
//                    "NAME" => "History identifier was not found",
//                    "CODE" => "FDVI.1003",
//                    "CAUSE" => "Found out that history id identifier does not exist",
//                    "FIX" => "Make sure that the history id is sent to the server when you are checking it"
//                ),
//                "USER_DOES_NOT_HAVE_HISTORY" => array(
//                    "NAME" => "You dont have any history",
//                    "CODE" => "FDVI.1004",
//                    "CAUSE" => "Found out that user does not have any history.",
//                    "FIX" => "Make sure that the there are history belongs to the user id in the database."
//                ),
//            ),
//        ),
//    ),
//    "USER_PROFILE" => array(
//        "UPDATE" => array(
//            "FULLNAME" => array(
//                "VALIDATION" => array(
//                    "ONE_OR_MORE_FIELDS_ARE_INVALID" => array(
//                        "NAME" => "One or more fields are invalid",
//                        "CODE" => "UUFVO.1001",
//                        "CAUSE" => "One or more required fields are empty or not set",
//                        "FIX" => "Make sure to check the required fields and check if they are set properly"
//                    ),
//                    "INVALID_PASSWORD" => array(
//                        "NAME" => "Wrong password",
//                        "CODE" => "UUFVI.1002",
//                        "CAUSE" => "Invalid password when comparing stored hashed password with request password",
//                        "FIX" => "Make sure that the request password matches stored hashed password."
//                    ),
//                    "USER_DATA" => array(
//                        "NOT_FOUND" => array(
//                            "NAME" => "No user data has been found",
//                            "CODE" => "UUFVUN.1001",
//                            "CAUSE" => "Found out that no user data has been found by session user id.",
//                            "FIX" => "Make sure that the user data exists in database by user id."
//                        )
//                    ),
//                ),
//                "QUERY_FAILED" => array(
//                    "NAME" => "Error updating fullname",
//                    "CODE" => "UUFVQ.1001",
//                    "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//                "QUERY_FAILED_TRY_CATCH" => array(
//                    "NAME" => "Error updating fullname",
//                    "CODE" => "UUFVQ.1002",
//                    "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//            ),
//            "PASSWORD" => array(
//                "VALIDATION" => array(
//                    "ONE_OR_MORE_FIELDS_ARE_INVALID" => array(
//                        "NAME" => "One or more fields are invalid",
//                        "CODE" => "UUPVO.1001",
//                        "CAUSE" => "One or more required fields are empty or not set",
//                        "FIX" => "Make sure to check the required fields and check if they are set properly"
//                    ),
//                    "USER_DATA" => array(
//                        "NOT_FOUND" => array(
//                            "NAME" => "No user data has been found",
//                            "CODE" => "UUPVUN.1002",
//                            "CAUSE" => "Found out that no user data has been found by session user id.",
//                            "FIX" => "Make sure that the user data exists in database by user id."
//                        )
//                    ),
//                    "INVALID_PASSWORD" => array(
//                        "NAME" => "Wrong password",
//                        "CODE" => "UUPVI.1003",
//                        "CAUSE" => "Invalid password when comparing stored hashed password with request password",
//                        "FIX" => "Make sure that the request password matches stored hashed password."
//                    ),
//                ),
//                "QUERY_FAILED" => array(
//                    "NAME" => "Error updating password",
//                    "CODE" => "UUPVQ.1001",
//                    "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//                "QUERY_FAILED_TRY_CATCH" => array(
//                    "NAME" => "Error updating fullname",
//                    "CODE" => "UUPVQ.1002",
//                    "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//            ),
//            "PINCODE" => array(
//                "VALIDATION" => array(
//                    "ONE_OR_MORE_FIELDS_ARE_INVALID" => array(
//                        "NAME" => "One or more fields are invalid",
//                        "CODE" => "UUPCVO.1001",
//                        "CAUSE" => "One or more required fields are empty or not set",
//                        "FIX" => "Make sure to check the required fields and check if they are set properly"
//                    ),
//                    "USER_DATA" => array(
//                        "NOT_FOUND" => array(
//                            "NAME" => "No user data has been found",
//                            "CODE" => "UUPCVO.1002",
//                            "CAUSE" => "Found out that no user data has been found by session user id.",
//                            "FIX" => "Make sure that the user data exists in database by user id."
//                        )
//                    ),
//                    "INVALID_PASSWORD" => array(
//                        "NAME" => "Wrong password",
//                        "CODE" => "UUPCVI.1003",
//                        "CAUSE" => "Invalid password when comparing stored hashed password with request password",
//                        "FIX" => "Make sure that the request password matches stored hashed password."
//                    ),
//                    "PIN_CODE_SHOULD_BE_4_DIGITS" => array(
//                        "NAME" => "Pin Code should be 4 digits only",
//                        "CODE" => "UUPCPC.1004",
//                        "CAUSE" => "Pin Code Is invalid, It is required to be 4 digits only",
//                        "FIX" => "Make sure that the Pin Code is 4 digits only in the request data"
//                    ),
//                ),
//                "QUERY_FAILED" => array(
//                    "NAME" => "Error updating Pin Code",
//                    "CODE" => "UUPCQ.1001",
//                    "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//                "QUERY_FAILED_TRY_CATCH" => array(
//                    "NAME" => "Error updating Pin Code",
//                    "CODE" => "UUPCQ.1002",
//                    "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                    "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//                ),
//            ),
//        ),
//    ),
//    "USER_SETTINGS" => array(
//        "UPDATE" => array(
//            "QUERY_FAILED" => array(
//                "NAME" => "Error updating fullname",
//                "CODE" => "UUQ.1001",
//                "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//            "QUERY_FAILED_TRY_CATCH" => array(
//                "NAME" => "Error updating fullname",
//                "CODE" => "UUQ.1002",
//                "CAUSE" => "The query failed to execute properly. This could be due to a variety of reasons including incorrect SQL syntax, missing data, or connectivity issues.",
//                "FIX" => "Check the SQL syntax, verify that all required data has been provided, and troubleshoot any connectivity issues."
//            ),
//        ),
//    ),
//);
