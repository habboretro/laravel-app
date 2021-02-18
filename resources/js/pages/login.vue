<script>
import Layout from "@/layouts/master"
import Index from "@/pages/index"
export default {
  layout: Layout,
  extends: Index,
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Login`,
    }
  },
}
</script>

