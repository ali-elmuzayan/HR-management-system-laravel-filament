variable "aws_region" {
  description = "AWS Region to deploy to"
  default     = "us-east-1"
}

variable "project_name" {
  description = "Name of the project"
  default     = "hrms-laravel"
}

variable "instance_type" {
  description = "EC2 Instance Type (t2.micro is Free Tier eligible)"
  default     = "t2.micro"
}

variable "public_key_path" {
  description = "Path to your public SSH key"
  default     = "~/.ssh/id_rsa.pub"
}

variable "key_name" {
  description = "Name of the SSH key pair in AWS"
  default     = "hrms-deploy-key"
}
