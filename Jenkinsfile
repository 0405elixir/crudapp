pipeline {

  agent {
    kubernetes {
      yamlFile 'builder.yaml'
    }
  }
environment {
      PROJECT_NAME = "kuber"
      OWNER_NAME   = "Artem Kalinin"
    }
  stages {

    stage('Deploy App to Kubernetes') {
      steps {
        container('kubectl') {
          withCredentials([file(credentialsId: 'mykubeconfig', variable: 'KUBECONFIG')]) {
            sh 'kubectl delete namespace crud'
            sh 'kubectl create ns crud'
            sh 'kubectl apply -f ./manifests -n crud'
          }
        }
      }
     } 
    
      stage('вывод информации') {
        steps {
            sh "ls -la"
            echo "Имя проекта ${PROJECT_NAME}"
            echo "Владелец ${OWNER_NAME}"
         }
      }
        
     stage('Тест 1. Проверка имени проекта') {
      steps {
        script {
          echo "Start of Stage Test1"
          echo 'Job Name: ' + env.JOB_NAME //   вывести имя проекта в Jenkins 
           echo "Privet ${PROJECT_NAME}"
          if (env.JOB_NAME == PROJECT_NAME) { //   если имя проекта в Jenkins совпадает с определенным в environment, то все Ок
            echo 'Имя не корректное'
          }
          else {
            sh сecho 'Имя корректное'
            error('Проверка имени не прошла')  //если имя проекта в Jenkins  НЕ совпадает с определенным в environment, то прерываем выполнение
          }
        }
       } 
      }
        
      stage('Тест2. Наличие файла') {
      steps {
        script {
          echo "Start of Stage Test2"
          if (fileExists('docker-compose.yaml')) {
           echo 'Файл найден. Открываю'
            sh "cat docker-compose.yaml"
          }
           else {
            echo 'Файл не найден'
            error('Проверка наличия файла не прошла')
           }
         }
        }
       }
      
    stage('Тест 3. Наличие пинга') {
      steps {
        script {
          ping 8.8.8.8 -w 10 -c3 -q
res=$?
echo «#> Ping check exit code: $res»
if [ $res == 2 ];then
echo «#> Could not resolve 8.8.8.8»
elif [ $res == 1 ]; then
echo «#> Could not reach 8.8.8.8»
else
echo «#> Restarting net.ppp0»
/etc/init.d/net.ppp0 restart --nocolor &
echo «#> Exit code (/etc/init.d/net.ppp0 restart): $?»
fi
          
         }
        }
       }
  }
}
