const resume = {
  data() {
    return {
      hasImage: false,
      image: null,
      formData: {
        img_url: {},
        name: '',
        surname: '',
        phone: '',
        email: '',
        careerObjective: '',
        categoriesResume: [],
        salaryFrom: '',
        salaryBefore: '',
        aboutMe: '',
        workBlock: [
          {
            name: '',
            post: '',
            department: '',
            month_from: '',
            year_from: '',
            month_to: '',
            year_to: '',
          }
        ],
        educationBlock: [
          {
            name: '',
            year_from: '',
            year_to: '',
            academic_degree: '',
            faculty: '',
            specialisation: '',
          }
        ],
        addSocial: {
          vkontakte: '',
          facebook: '',
          instagram: '',
          skype: '',
        },
        duties0: '',
        duties1: '',
        duties2: '',
        duties3: '',
        duties4: '',
        duties5: '',
      },
    };
  }
};

export default resume;