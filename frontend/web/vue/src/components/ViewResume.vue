<template>
	<FormTemplate :paramsFile="getFormData()" v-model="formData" :dopClass="'hideBtn'">

		<img class="image-show" :src="`${process.env.VUE_APP_API_URL}` + img">

	</FormTemplate>
</template>

<script>
  import FormResume from '../lk-form/resume-form';
  import FormTemplate from "./FormTemplate";
  import Resume from "../mixins/resume";

  export default {
    name: 'FormResume',
		data() {
      return {
        img: ''
			}
		},
    mixins: [Resume],
    components: {FormTemplate},
    created() {

      this.getEmploymentType().then(response => {
        FormResume.categoriesResume.items = response.data;
        for (let i = 0; i < response.data.length; i++) {
          this.$set(FormResume.categoriesResume.items, i, response.data[i]);
        }
      });
      this.$http.get(`${process.env.VUE_APP_API_URL}/request/test-resume/` + this.$route.params.id + '?expand=experience,education,skill,category')
        .then(response => {

          if(response.data.image_url == null) {
            document.querySelector('.image-show').classList.add('hide');
					} else {
            this.img = response.data.image_url;
					}

					this.formData.name = response.data.first_name;
					this.formData.surname = response.data.second_name;
					this.formData.phone = response.data.phone;
					this.formData.email = response.data.email;
					this.formData.categoriesResume = response.data.category;
					this.formData.careerObjective = response.data.title;
					this.formData.salaryFrom = response.data.min_salary;
					this.formData.salaryBefore = response.data.max_salary;
					this.formData.aboutMe = response.data.description;
					this.formData.addSocial.vkontakte = response.data.vk;
					this.formData.addSocial.facebook = response.data.facebook;
					this.formData.addSocial.instagram = response.data.instagram;
					this.formData.addSocial.skype = response.data.skype;
					this.formData.educationBlock = response.data.education;
					this.formData.workBlock = response.data.experience;
					if(response.data.vk.length > 0 || response.data.facebook.length > 0 || response.data.instagram.length > 0 || response.data.instagram.length > 0) {
						document.querySelector('.social-block button').click();
					}
					for (let i = 0; i < response.data.skill.length; i++) {
						this.formData['duties' + i] = response.data.skill[i].name;
					}
					let workLength = response.data.experience.length - 1;
					for (let i = 0; i < workLength; i++) {
						document.querySelector('.btnWork').click();
					}
					let educationLength = response.data.education.length - 1;
					for (let i = 0; i < educationLength; i++) {
						document.querySelector('.btnEducation').click();
					}

					let inputs = document.querySelectorAll('.v-input input');

					for(let i = 0; i < inputs.length; i++) {
					  inputs[i].disabled = true;
					}

					console.log('Форма успешно получена');
          }, response => {
          }
        )
    },
    methods: {
      getFormData() {
        return FormResume;
      },
      async getEmploymentType() {
        return await this.$http.get(`${process.env.VUE_APP_API_URL}/request/category`)
      },
    },
  }
</script>

<style>
	.hideBtn button {
		max-height: 0;
		overflow: hidden;
		opacity: 0 !important;
	}

	/*.hideBtn .v-input {*/
		/*pointer-events: none;*/
	/*}*/
	.image-show {
		width: 200px;
		margin: 20px 0;
	}
	.hide {
		opacity: 0;
	}
</style>