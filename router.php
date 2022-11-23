<?php

require_once __DIR__ . '/vendor/autoload.php';


$app = new \App\Application();

#Login
$app->setRoute("login", [\App\Controllers\LoginController::class, "login"]);
$app->setRoute("logout", [\App\Controllers\LoginController::class, "logout"]);

#Home page - dashboard
$app->setRoute("admin_home", [\App\Controllers\HomeController::class, "adminHome"]);
$app->setRoute("home", [\App\Controllers\HomeController::class, "userHome"]);

#User manager
$app->setRoute("add_user", [\App\Controllers\UserManagerController::class, "addUser"]);
$app->setRoute("delete_user", [\App\Controllers\UserManagerController::class, "deleteUser"]);
$app->setRoute("users", [\App\Controllers\UserManagerController::class, "recordsUsers"]);
$app->setRoute("profile", [\App\Controllers\UserManagerController::class, "userProfile"]);

#Company Manager
$app->setRoute("companies", [\App\Controllers\CompanyManagerController::class, "recordsCompanies"]);
$app->setRoute("add_company", [\App\Controllers\CompanyManagerController::class, "addCompany"]);
$app->setRoute("delete_company", [\App\Controllers\CompanyManagerController::class, "deleteCompany"]);
$app->setRoute("edit_company", [\App\Controllers\CompanyManagerController::class, "editCompany"]);

#Department Manager
$app->setRoute("departments", [\App\Controllers\DepartmentManagerController::class, "recordsDepartments"]);
$app->setRoute("add_department", [\App\Controllers\DepartmentManagerController::class, "addDepartment"]);
$app->setRoute("delete_department", [\App\Controllers\DepartmentManagerController::class, "deleteDepartment"]);
$app->setRoute("edit_department", [\App\Controllers\DepartmentManagerController::class, "editDepartment"]);

#Position Manager
$app->setRoute("positions", [\App\Controllers\PositionManagerController::class, "recordsPositions"]);
$app->setRoute("add_position", [\App\Controllers\PositionManagerController::class, "addPosition"]);
$app->setRoute("delete_position", [\App\Controllers\PositionManagerController::class, "deletePosition"]);
$app->setRoute("edit_position", [\App\Controllers\PositionManagerController::class, "editPosition"]);

#Motor Attribute
$app->setRoute("motor_card_manager", [\App\Controllers\MotorCardManagerController::class, "getMotorCard"]);

return $app;

