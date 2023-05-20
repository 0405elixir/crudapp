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
          if (ping google.com &> /dev/null)
then
  echo "success"
else
  echo "error"
fi
          
         }
        }
       }
  }
}
