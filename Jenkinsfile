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
           IP='192.168.1.1'
sh 'fping -c1 -t300 $IP 2>/dev/null 1>/dev/null'
if [ "$?" = 0 ]
then
  echo "Host found"
else
  echo "Host not found"
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
