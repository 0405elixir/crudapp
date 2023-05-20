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
      stage('Test1') {
        steps {
             sh "ls -la"
            echo "Start of Stage Test1"
            //echo "Privet ${PROJECT_NAME}"
            //echo "Owner is ${OWNER_NAME}"
          script {
            sh 'ping 8.8.8.8 -c 1'
            if ( "$?" = 0 ) {
            echo "ok"
            }         
            else {
            error('No access')
            }
           }
         }
       }
     stage('Test2') {
      steps {
        script {
          echo "Start of Stage Test2"
          echo 'Job Name: ' + env.JOB_NAME //   вывести имя проекта в Jenkins 
           echo "Privet ${PROJECT_NAME}"
          if (env.JOB_NAME == PROJECT_NAME) {
            echo 'Name is correct'
          }
          else {
            sh "echo 'Name is not correct'"
            error('Name verification failed')
          }
        }
      }
    }
    }

  
}
