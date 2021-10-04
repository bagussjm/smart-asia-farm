import config from "../config";
export default {
    uploadUrl: config.AppUrl+'/api/file/post',
    doUpload: async (file) => {
        try {
            let data = new FormData();
            data.append('image',file);

            return await axios.post(config.AppUrl+'/api/file/post',data).then(function (response) {
                if (response.data.code === 200){
                    return  response;
                }
            });
        } catch (err) {
            console.error(err);
        }
    }
}
