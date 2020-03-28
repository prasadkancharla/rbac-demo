<?php
require ("autoload.php");

use models\ActionType;
use services\UserService;
use services\RoleService;
use services\ResourceService;

// Defining some resources
$resourceProduct = ResourceService::addResource(['name' => 'Product']);
$resourceCategory = ResourceService::addResource(['name' => 'Category']);
$resourceOrder = ResourceService::addResource(['name' => 'Order']);

// Defining some roles
$productsRole = RoleService::addRole(["name" => "Products Role"]);
RoleService::addPermission($productsRole->getId(), ['action_type' => ActionType::READ, 'resource' => $resourceProduct]);
RoleService::addPermission($productsRole->getId(), ['action_type' => ActionType::WRITE, 'resource' => $resourceProduct]);
RoleService::addPermission($productsRole->getId(), ['action_type' => ActionType::DELETE, 'resource' => $resourceProduct]);

$categoriesRole = RoleService::addRole(["name" => "Categories Role"]);
RoleService::addPermission($categoriesRole->getId(), ['action_type' => ActionType::WRITE, 'resource' => $resourceCategory]);

$adminRole = RoleService::addRole(["name" => "Admin Role"]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::READ, 'resource' => $resourceProduct]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::WRITE, 'resource' => $resourceProduct]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::DELETE, 'resource' => $resourceProduct]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::READ, 'resource' => $resourceCategory]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::WRITE, 'resource' => $resourceCategory]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::DELETE, 'resource' => $resourceCategory]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::READ, 'resource' => $resourceOrder]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::WRITE, 'resource' => $resourceOrder]);
RoleService::addPermission($adminRole->getId(), ['action_type' => ActionType::DELETE, 'resource' => $resourceOrder]);

// Define some users
$standardUser = UserService::addUser(["name" => "John Smith", "email" => "john.smith@rbac.com"]);
$adminUser = UserService::addUser(["name" => "Admin User", "email" => "admin@rbac.com"]);

// Adding roles to users
UserService::addUserRole($standardUser->getId(), $productsRole->getId());
UserService::addUserRole($standardUser->getId(), $categoriesRole->getId());

UserService::addUserRole($adminUser->getId(), $adminRole->getId());


UserService::addUserRole($adminUser->getId(), $adminRole->getId());
echo "Standard User can perform: \r\n";
echo "--" .ActionType::WRITE . " on Product: " . 
    (UserService::canUserPerform($standardUser->getId(), $resourceProduct->getId(), ActionType::WRITE) ? "YES" : "NO") . "\r\n";
echo "--" . ActionType::READ . " on Order: " . 
    (UserService::canUserPerform($standardUser->getId(), $resourceOrder->getId(), ActionType::WRITE) ? "YES" : "NO") . "\r\n";

echo "Admin User can perform: \r\n";
echo "--" . ActionType::WRITE . " on Category: " . 
    (UserService::canUserPerform($adminUser->getId(), $resourceCategory->getId(), ActionType::WRITE) ? "YES" : "NO") . "\r\n";
echo "--" . ActionType::READ . " on Order: " . 
    (UserService::canUserPerform($adminUser->getId(), $resourceOrder->getId(), ActionType::WRITE) ? "YES" : "NO") . "\r\n";
echo "--" . ActionType::WRITE . " on Category: " . 
    (UserService::canUserPerform($adminUser->getId(), $resourceCategory->getId(), ActionType::WRITE) ? "YES" : "NO") . "\r\n";
echo "--" . ActionType::READ . " on Order: " . 
    (UserService::canUserPerform($adminUser->getId(), $resourceOrder->getId(), ActionType::WRITE) ? "YES" : "NO") . "\r\n";