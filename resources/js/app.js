import MapCoordinateInput from "./components/shared/forms/MapCoordinateInput";

require('./bootstrap');

import Vue from 'vue';

import SaveButton from "./components/shared/buttons/SaveButton";
import AddButton from "./components/shared/buttons/AddButton";
import KostKitaIcon from "./components/shared/logo/KostKitaIcon";
import KostKitaIconText from "./components/shared/logo/KostKitaIconText";
import KostKitaIconTextMobile from "./components/shared/logo/KostKitaIconTextMobile";
import PasswordInput from "./components/shared/forms/PasswordInput";
import TextInput from "./components/shared/forms/TextInput";
import DateInput from "./components/shared/forms/DateInput";
import TextAreaInput from "./components/shared/forms/TextAreaInput";
import RegionInput from "./components/shared/forms/RegionInput";
import ImageInput from "./components/shared/forms/ImageInput";
import CostTypeBadge from "./components/shared/ui/CostTypeBadge";
import ImageLightbox from "./components/shared/ui/ImageLightbox";
import FacilityCheckBox from "./components/shared/forms/FacilityCheckBox";
import MoneyInput from "./components/shared/forms/MoneyInput";
import VideoInput from "./components/shared/forms/VideoInput";
import BookRulesRepeater from "./components/shared/forms/BookRulesRepeater";
import VrInput from "./components/shared/forms/VrInput";
import config from "./config";
import SingleImageInput from "./components/shared/forms/SingleImageInput";

Vue.prototype.$config = config;

// buttons
Vue.component('save-btn',SaveButton);
Vue.component('add-btn',AddButton);

// icons
Vue.component('kk-icon',KostKitaIcon);
Vue.component('kk-icon-text',KostKitaIconText);
Vue.component('kk-icon-text-mobile',KostKitaIconTextMobile);
/*
* forms components
* */
Vue.component('txt-input', TextInput);
Vue.component('pw-input', PasswordInput);
Vue.component('dp-input', DateInput);
Vue.component('ta-input',TextAreaInput);
Vue.component('rg-input',RegionInput);
Vue.component('img-input',ImageInput);
Vue.component('cb-facility',FacilityCheckBox);
Vue.component('mn-input',MoneyInput);
Vue.component('vid-input',VideoInput);
Vue.component('bk-repeater-input',BookRulesRepeater);
Vue.component('vr-input',VrInput);
Vue.component('map-input',MapCoordinateInput);
Vue.component('single-img-input',SingleImageInput);

/*
* UI Components
* */
Vue.component('ct-badge',CostTypeBadge);
Vue.component('img-lb', ImageLightbox);

Vue.prototype.$dzImgPush = function (file,url,data) {
    let manual = true;
    if (file.manuallyAdded === undefined){
        manual = false;
    }
    data.push({
        name: file.name,
        file: file,
        url: url,
        manual: manual
    })
};
Vue.prototype.$dzImgPull = function (file,url,data) {
    let fileIndex = data.findIndex(f => f.name === file.name);
    let formData = new FormData();
    formData.append('url',data[fileIndex].url);
    axios.post(config.AppUrl+url,formData)
        .then(function (response) {
            console.log(response.data);
        });

    data.splice(fileIndex,1);
};

const app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }
});
