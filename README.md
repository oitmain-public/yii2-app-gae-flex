# yii2-app-gae-flex
Create Yii2 basic application for deploy on Google App Engine (Flex Environment)

Flex Environment allows read and write on the directory `sys_get_temp_dir()`, which allows Yii2 to use the runtime folder

However, static assets are uploaded into Google Storage for public access

