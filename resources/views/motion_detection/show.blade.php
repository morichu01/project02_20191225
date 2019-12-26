<html>

<body>
  <div id="app">
    <h1>JavaScriptで動きを検知して画像保存</h1>
    <video ref="video" width="640" height="480"></video>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
  <script>
    new Vue({
      el: '#app',
      data: {
        canvas: null,
        imageData: null,
        detecting: false,
        differenceThreshold: 10 // どれだけ違いがあれば動いたと判断するか（RGB）
      },
      computed: {
        video() {

          return this.$refs['video'];

        },
        context() {

          return this.canvas.getContext('2d');

        }
      },
      methods: {
        // detectMotion() {

        //   setInterval(() => {

        //     if (!this.detecting) {

        //       this.detecting = true;
        //       const prevImageData = this.imageData;
        //       const video = this.video;
        //       this.context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
        //       this.imageData = this.context.getImageData(0, 0, video.videoWidth, video.videoHeight);

        //       if (this.hasDifference(prevImageData, this.imageData)) { // 2枚の画像に違いがあるかをチェック

        //         // 画像を送信
        //         this.canvas.toBlob((blob) => {

        //           const url = '/motion_detection/save_image';
        //           let formData = new FormData();
        //           formData.append('image', blob);

        //           axios.post(url, formData)
        //             .then((response) => {

        //               if (response.data.result) {

        //                 console.log('画像を保存しました');

        //               }

        //             })
        //             .catch((error) => {

        //               // エラー処理

        //             })
        //             .then(() => {

        //               this.detecting = false;

        //             });

        //         });

        //       } else {

        //         this.detecting = false;

        //       }

        //     }

        //   }, 500);

        // },
        // hasDifference(prevImageData, currentImageData) {

        //   if (prevImageData === null) {

        //     return false;

        //   }

        //   for (let i = 0; i < currentImageData.data.length; i += 4) { // 画像をピクセル単位で比較

        //     let prevRGB = {
        //       red: prevImageData.data[i] / 3,
        //       green: prevImageData.data[i + 1] / 3,
        //       blue: prevImageData.data[i + 2] / 3,
        //     };
        //     let currentRGB = {
        //       red: currentImageData.data[i] / 3,
        //       green: currentImageData.data[i + 1] / 3,
        //       blue: currentImageData.data[i + 2] / 3,
        //     };

        //     let differences = {
        //       red: Math.abs(prevRGB.red - currentRGB.red),
        //       green: Math.abs(prevRGB.green - currentRGB.green),
        //       blue: Math.abs(prevRGB.blue - currentRGB.blue),
        //     };

        //     for (let key in differences) {

        //       if (differences[key] > this.differenceThreshold) {

        //         return true;

        //       }

        //     }

        //     return false;

        //   }

        // }
      },
      mounted() {

        // ウェブカメラへアクセス
        navigator.mediaDevices.getUserMedia({
            video: true
          })
          .then((stream) => {

            this.video.srcObject = stream;
            this.video.play();

            this.canvas = document.createElement('canvas');
            this.canvas.width = this.video.width;
            this.canvas.height = this.video.height;
            this.detectMotion();

          });

      }
    });
  </script>
</body>

</html>