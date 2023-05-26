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
            sh 'ls -la'
            echo "Имя проекта ${PROJECT_NAME}"
            echo "Владелец ${OWNER_NAME}"
         }
       }
        
     stage('Тест 1. Проверка имени проекта') {
      steps {
        script {
          echo "Start of Stage Test1"
          echo "Имя  задачи, заданное в  Jenkins: "  + env.JOB_NAME //   вывести имя задачи в Jenkins 
          echo "Имя заданное в  Jenkinsfile: ${PROJECT_NAME}"
          if (env.JOB_NAME == PROJECT_NAME) { //   если имя задачи в Jenkins совпадает с  именем проекта, определенным в environment, то все Ок
            echo "Имя  корректное"
          }
          else {
            echo "Имя  не корректное"
            error('Проверка имени не прошла')  //если имя задачи в Jenkins  НЕ совпадает с определенным в environment, то прерываем выполнение
          }
        }
       } 
      }
        
      stage('Тест2. Наличие файла') {
      steps {
        script {
          echo "Start of Stage Test2"
          if (fileExists('docker-compos.yaml')) {
            echo "Файл найден. Открываю"
            sh 'cat docker-compose.yaml'
          }
           else {
             echo "Файл не найден"
             error('Проверка наличия файла не прошла')
           }
         }
        }
       }
      
   }
}
