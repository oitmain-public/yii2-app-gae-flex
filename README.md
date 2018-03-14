# yii2-app-gae-flex
Create Yii2 basic application for deploy on Google App Engine (Flex Environment)

Flex Environment allows read and write on the directory `sys_get_temp_dir()`, which allows Yii2 to use the runtime folder

However, static assets are uploaded into Google Storage for public access

(Advance branch adds local environment support and pretty url)

Instruction for advance branch : https://github.com/oitmain-public/yii2-app-gae-flex/blob/advanced/README.md

### Prerequisites
 * 

### Installalion

Clone project and install composer requirements

```bash
$ git clone https://github.com/oitmain-public/yii2-app-gae-flex
$ # For Advanced app, clone following branch instead
$ # git clone -b advanced https://github.com/oitmain-public/yii2-app-gae-flex
$ cd yii2-app-gae-flex
$ composer install
```

Copy and update configuration files

```bash
$ cp app.yaml.dist app.yaml
```

Update `config/web.php`
* `assetsManager` and `cookieValidationKey`

### Local Deployment
```bash
$ php -S localhost:8080 -t web/
```

### Deploy to Google App Engine

See https://cloud.google.com/appengine/docs/flexible/php/testing-and-deploying-your-app

```bash
$ gcloud app deploy —version [YOUR_VERSION_ID] —no-promote —project [YOUR_PROJECT_ID] 
```

### Google Cloud SQL
 * https://stackoverflow.com/questions/43964978/cannot-connect-to-google-cloudsql-from-app-engine
 * https://cloud.google.com/appengine/docs/flexible/php/using-cloud-sql
 * Enable Cloud SQL API on app engine project
 * Give Cloud SQL permission to app engine default service account email on Cloud SQL project

### Troubleshooting
 * A circular dependency is detected for bundle
   * This error occurs when asset bundle is called twice. Once for front view, and once for error view.
   * Use `app\models\PhpErrorHandler` to see the actual error without calling the error view
