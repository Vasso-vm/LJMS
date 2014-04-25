<?php
	namespace Ljms\CoreBundle\Validator\Constraints;

	use Symfony\Component\Validator\Constraints;
	use Symfony\Component\Validator\ConstraintValidator;
	use Ljms\CoreBundle\Entity\Profile;

	/**
	 * @Annotation
	 */
	class VerifyEmailValidator extends ConstraintValidator
	{
		public function validate($value,Constraint $constraint)
		{
			if ($this->getDoctrine()->getRepository('LjmsCoreBundle:Profile')->find($value)){
				$this->context->addViolation(
                $constraint->message,
                array('%string%' => $value));
            }
		}
		
	}
?>