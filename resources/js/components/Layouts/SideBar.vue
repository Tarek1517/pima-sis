<script setup>
const props = defineProps({
        text:{
            type: Boolean,
            default: true
        }
    });
</script>

<template>
    <div class="mx-auto">
        <div>
            <div class="flex items-center gap-3 p-5">
                <img class="w-32 h-auto" src="@/assets/images/img/logo.png">
            </div>
           
            <ul class="flex flex-col gap-5 px-5 ">
                <li>
                    <RouterLink :to="{name:'Dashboard'}" class="flex items-center gap-2">
                        <div>
                            <Icon name="ic:twotone-dashboard-customize" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-black">Dashboard</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink :to="{name:'DashboardServices'}" class="flex items-center gap-2">
                        <div>
                            <Icon name="material-symbols:service-toolbox-sharp" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-black">Services</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink :to="{name:'ProjectCategory'}" class="flex items-center gap-2">
                        <div>
                            <Icon   name="carbon:ibm-data-product-exchange" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-black">Project Category</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink :to="{name:'AllProjects'}" class="flex items-center gap-2">
                        <div>
                            <Icon   name="carbon:ibm-data-product-exchange" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-black">Projects</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  to="/admin/request" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-black">Service Request</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  :to="{name:'TeamMember'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p  v-if="text" class="text-black">Team Member</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  :to="{name:'AdminPackage'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-black" />
                        </div>
                        <p   class="text-black">Package</p>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink  :to="{name:'DashboardTrending'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p   class="text-black">Trending</p>
                    </RouterLink>
                </li>
				<li>
                    <RouterLink  :to="{name:'AdminReview'}" class="flex items-center gap-2">
                        <div >
                            <Icon name="solar:gallery-check-bold" size="20" class="text-primary" />
                        </div>
                        <p   class="text-black">Review</p>
                    </RouterLink>
                </li>               
            </ul>
        </div>
    </div>
</template>
