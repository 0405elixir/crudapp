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
        
     stage('Тест имени проекта') {
      steps {
        script {
          echo "Start of Stage Test1"
          echo 'Job Name: ' + env.JOB_NAME //   вывести имя проекта в Jenkins 
           echo "Privet ${PROJECT_NAME}"
          if (env.JOB_NAME == PROJECT_NAME) { //   если имя проекта в Jenkins совпадает с определенным в environment, то все Ок
            echo 'Name is correct'
          }
          else {
            sh "echo 'Name is not correct'"
            error('Name verification failed')  //если имя проекта в Jenkins  НЕ совпадает с определенным в environment, то прерываем выполнение
          }
        }
       } 
      }
        
      stage('Тест наличия файла') {
      steps {
        script {
          echo "Start of Stage Test2"
          if (fileExists('docker-compose.yaml')) {
           echo 'Yes'
            sh "cat docker-compose.yaml"
          }
           else {
            echo 'No'
            error('Name verification failed')
           }
         }
        }
       }
        
  }
}
