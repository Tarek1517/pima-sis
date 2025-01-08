<script setup>
import SummernoteEditor from "vue3-summernote-editor";
import { ref, onMounted } from "vue";
import useAxios from "@/composables/useAxios";
import { useAuthStore } from "@/stores/useAuthStore";
import { useRouter } from "vue-router";
import { toast } from "vue3-toastify";

const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
const router = useRouter();

//handle service image
const serviceImg = ref(null);
const onFileChange = (image) => {
  const file = image.target.files[0];
  form.value.image = file;
  serviceImg.value = URL.createObjectURL(file);
};

const form = ref({
  name: null,
  title: null,
  icon: null,
  image: null,
  order_number: null,
  description: null,
});

// Save Service
const onSubmit = async () => {
  const response = await sendRequest({
    method: "post",
    url: "/v1/service",
    data: form.value,
    headers: {
      "Content-Type": "multipart/form-data",
    },
  });
  if (response?.data) {
    toast.success("Service Added Successfully", {
      autoclose: 1000,
      theme: "dark",
    });
    await router.push("/admin/services");
  }
};
</script>
<template>
  <AppLayout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 mt-5">
      <div class="p-4 bg-white shadow-md w-full max-w-3xl">
        <h3 class="text-sm mb-5 text-center font-semibold">Add New Service</h3>
        <div class="w-full flex flex-wrap">
          <div class="w-full flex flex-col gap-3 px-2">
            <div class="w-full px-2">
              <label for="title" class="text-xs mb-1">Service Name</label>
              <input
                type="text"
                class="bg-transparent p-2 border border-primary w-full rounded"
                v-model="form.name"
              />
            </div>

            <div class="w-full px-2">
              <label for="title" class="text-xs mb-1">Service Title</label>
              <input
                type="text"
                class="bg-transparent p-2 border border-primary w-full rounded"
                v-model="form.title"
              />
            </div>
            <div class="w-full flex items-center space-x-5 px-2">
              <div class="w-2/3">
                <label for="title" class="text-xs mb-1 flex items-center gap-2">
                  Icon Code
                  <a
                    href="https://icones.js.org/collection/all"
                    target="_blank"
                    class="text-primary flex items-center gap-1"
                  >
                    Get icon code form here
                    <Icon name="mdi:share-outline" />
                  </a>
                </label>
                <input
                  type="text"
                  class="bg-transparent p-2 border border-primary w-full rounded"
                  v-model="form.icon"
                />
              </div>
              <div class="w-1/3">
                <label for="title" class="text-xs mb-1">Order Number</label>
                <input
                  type="text"
                  class="bg-transparent p-2 border border-primary w-full rounded"
                  v-model="form.order_number"
                />
              </div>
            </div>
          </div>
          <div class="w-full flex flex-col gap-3 px-2">
            <div class="w-full px-2 mt-3">
                <label for="short_description" class="text-sm mb-2 block">Short Description</label>
                <textarea v-model="form.short_description" class=" w-full h-20 border border-primary focus:border-primary focus:ring-0 focus:shadow focus:shadow-primary"></textarea>
            </div>
          </div>
          <div class="w-full flex flex-col gap-3 px-2">
            <div class="w-full px-2 mt-3">
              <label for="image" class="text-xs block mb-2"
                >Service Image</label
              >
              <label
                for="cover_image"
                class="w-full h-64 flex items-center justify-center gap-3 p-4 border border-dashed border-primary rounded-md text-primary cursor-pointer"
              >
                <input
                  type="file"
                  id="cover_image"
                  hidden
                  @change="onFileChange"
                />
                <img
                  v-if="serviceImg"
                  :src="serviceImg"
                  class="w-full h-full object-cover rounded-md items-center"
                />
                <div v-else>
                  <p class="text-xs">Upload Service Image</p>
                </div>
              </label>
            </div>
          </div>
          <div class="w-full px-2 editor mt-5">
            <label for="title" class="text-sm mb-1 text-gray-700 py-3 block px-2">
              Description
            </label>
            <div class="editor_data px-2">
              <SummernoteEditor v-model="form.description" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center pt-10">
      <button
        class="w-1/2 mx-auto bg-primary py-3 text-white"
        @click="onSubmit"
      >
        Save Project
      </button>
    </div>
  </AppLayout>
</template>
