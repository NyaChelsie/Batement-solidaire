import { createRouter, createWebHistory } from 'vue-router'
import LoginComponent from '@/components/LoginComponent.vue'
import InscriptionComponent from '@/components/InscriptionComponent.vue'





import AdminDashboard from '@/views/AdminDashboard.vue'
import HomeView from '@/views/HomeView.vue'
import GoalsView from '@/views/public/GoalsView.vue'
import ImpactFeed from '@/views/public/ImpactFeed.vue'
import SubscriptionPage from '@/views/public/SubscriptionPage.vue'

import CampaignLanding from '@/views/public/CampaignLanding.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginComponent,
  },
  {
    path: '/inscription',
    name: 'inscription',
    component: InscriptionComponent,
  },
  {
    path: '/dashboard',
    redirect: '/donor-dashboard'
  },
  {
    path: '/donor-dashboard',
    name: 'donor-dashboard',
    component: () => import('@/views/DonorDashboard.vue'),
    meta: { requiresAuth: true, role: 'donateur' }
  },
  {
    path: '/admin',
    name: 'admin',
    component: AdminDashboard,
    meta: { requiresAuth: true, role: 'admin' }
  },
  {
    path: '/nurse',
    name: 'nurse',
    component: () => import('@/views/NurseDashboard.vue'),
    // In a final app you'd check for role 'infirmier'
    // meta: { requiresAuth: true, role: 'infirmier' }
  },
  {
    path: '/AdminDashboard',
    redirect: '/admin'
  },
  {
    path: '/campaign/:slug',
    name: 'campaign-landing',
    component: CampaignLanding
  },
  {
    path: '/objectives',
    name: 'goals',
    component: GoalsView
  },
  {
    path: '/impact',
    name: 'impact',
    component: ImpactFeed
  },
  {
    path: '/subscribe',
    name: 'subscription',
    component: SubscriptionPage
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
