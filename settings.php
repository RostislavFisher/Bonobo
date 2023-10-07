<?php


// system imports

include 'frameworkFiles/HTTPRequest.php';
include 'frameworkFiles/HeaderHTTPRequest.php';
include 'frameworkFiles/HTTPResponse.php';
include 'frameworkFiles/WebEntityCustom.php';
include 'frameworkFiles/HeaderHTTPResponse.php';
include 'frameworkFiles/HTTPReceivedData.php';
include 'frameworkFiles/Templater.php';
include 'frameworkFiles/Router.php';
include 'frameworkFiles/Logging.php';
include 'frameworkFiles/HTTPForm.php';
include 'frameworkFiles/User.php';
include 'frameworkFiles/Database.php';
include 'frameworkFiles/DatabaseObject.php';
include 'frameworkFiles/JSONDatabase.php';
$database = new JSONDatabase("database.json");
$database->open();


// user imports

include 'appModules/Module.php';
include 'appModules/Modules.php';
include 'appModules/TemperatureModule.php';
include 'appModules/RoomTemperatureModule.php';
include 'appModules/CityModule.php';
include 'musicPlayer/Song.php';



// user settings

use appModules\CityModule;
use appModules\Modules;
use appModules\RoomTemperatureModule;


$KitchenModule = new RoomTemperatureModule();
$KitchenModule->name = "Kitchen";
$KitchenModule->description = "This is the kitchen";
$KitchenModule->icon = "icon";
$KitchenModule->value = "24";

$BedroomModule = new RoomTemperatureModule();
$BedroomModule->name = "Bedroom";
$BedroomModule->description = "This is the bedroom";
$BedroomModule->icon = "icon";
$BedroomModule->value = "22";

$BathroomModule = new RoomTemperatureModule();
$BathroomModule->name = "Bathroom";
$BathroomModule->description = "This is the bathroom";
$BathroomModule->icon = "icon";
$BathroomModule->value = "20";

$AllModules = new Modules();
$AllModules->addModule($KitchenModule);
$AllModules->addModule($BedroomModule);
$AllModules->addModule($BathroomModule);

$PrahaCity = new CityModule();
$PrahaCity->name = "Praha";
$PrahaCity->description = "This is the city of Prague";
$PrahaCity->icon = "icon";
$PrahaCity->updateUsingAPI();
